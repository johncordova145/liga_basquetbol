<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

/** Vistas de consulta pública: Inicio, Partidos, Clasificación, Calendario, y los detalles. */
class PublicController extends Controller
{
    public function home(): View
    {
        $news = News::published()->latest('published_at')->take(8)->get();

        // Partidos de hoy; si no hay, se muestran los próximos.
        $matches = GameMatch::with(['homeTeam', 'awayTeam'])->onDate(today())->orderBy('played_at')->get();
        $matchesTitle = 'Partidos de hoy';

        if ($matches->isEmpty()) {
            $matches = GameMatch::with(['homeTeam', 'awayTeam'])
                ->scheduled()->where('played_at', '>=', now())
                ->orderBy('played_at')->take(4)->get();
            $matchesTitle = 'Próximos partidos';
        }

        // Top 5 de cada categoría (una sola consulta de partidos finalizados).
        $finished = GameMatch::finished()->get();
        $tables = [];
        foreach (Team::CATEGORIES as $key => $label) {
            $tables[$label] = Team::standings($key, null, $finished)->take(5);
        }

        return view('public.home', compact('news', 'matches', 'matchesTitle', 'tables'));
    }

    public function matches(Request $request): View
    {
        $selected = $this->parseDate($request->query('fecha'));

        $matches = GameMatch::with(['homeTeam', 'awayTeam'])
            ->onDate($selected)
            ->orderBy('played_at')
            ->get();

        // Se agrupan por categoría (la del equipo local), como FIBA agrupa por competición.
        $groups = $matches->groupBy(fn ($m) => $m->homeTeam->category);

        // Tira de 10 días: 3 antes y 6 después de la fecha elegida.
        $days = collect(range(-3, 6))->map(fn ($offset) => $selected->copy()->addDays($offset));

        return view('public.matches', [
            'selected' => $selected,
            'days' => $days,
            'prev' => $selected->copy()->subDays(7)->toDateString(),
            'next' => $selected->copy()->addDays(7)->toDateString(),
            'groups' => $groups,
            'liveCount' => $matches->where('status', GameMatch::LIVE)->count(),
        ]);
    }

    public function matchShow(GameMatch $game): View
    {
        $game->load([
            'homeTeam.players' => fn ($q) => $q->orderBy('jersey_number'),
            'awayTeam.players' => fn ($q) => $q->orderBy('jersey_number'),
        ]);

        return view('public.match-show', ['match' => $game]);
    }

    public function ranking(Request $request): View
    {
        $finished = GameMatch::finished()->get();
        $panels = [];

        foreach (Team::CATEGORIES as $key => $label) {
            $overall = Team::standings($key, null, $finished);

            $zones = Team::where('category', $key)->whereNotNull('zone')
                ->distinct()->orderBy('zone')->pluck('zone')
                ->mapWithKeys(fn ($zone) => [$zone => Team::standings($key, $zone, $finished)]);

            $panels[$key] = [
                'label' => $label,
                'overall' => $overall,
                'zones' => $zones,
                'attack' => Team::leadersBy($overall, 'pf', true),
                'defense' => Team::leadersBy($overall, 'pa', false),
            ];
        }

        $active = array_key_exists((string) $request->query('categoria'), $panels)
            ? $request->query('categoria')
            : array_key_first($panels);

        return view('public.ranking', compact('panels', 'active'));
    }

    public function calendar(Request $request): View
    {
        $month = $this->parseMonth($request->query('mes'));

        $days = GameMatch::with(['homeTeam', 'awayTeam'])
            ->whereBetween('played_at', [$month->copy()->startOfMonth(), $month->copy()->endOfMonth()])
            ->orderBy('played_at')
            ->get()
            ->groupBy(fn ($m) => $m->played_at->toDateString());

        return view('public.calendar', [
            'month' => $month,
            'prev' => $month->copy()->subMonth()->format('Y-m'),
            'next' => $month->copy()->addMonth()->format('Y-m'),
            'days' => $days,
        ]);
    }

    public function newsShow(News $news): View
    {
        abort_unless($news->isPublished(), 404); // los borradores no se ven

        $others = News::published()->whereKeyNot($news->id)->latest('published_at')->take(3)->get();

        return view('public.news-show', compact('news', 'others'));
    }

    // ---- Ayudantes privados ----
    private function parseDate(?string $value): Carbon
    {
        if ($value && preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            try {
                return Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
            } catch (\Throwable) {
                // valor imposible (2026-02-31): se cae a "hoy"
            }
        }

        return today();
    }

    private function parseMonth(?string $value): Carbon
    {
        if ($value && preg_match('/^\d{4}-\d{2}$/', $value)) {
            try {
                return Carbon::createFromFormat('Y-m-d', $value . '-01')->startOfDay();
            } catch (\Throwable) {
            }
        }

        return today()->startOfMonth();
    }
}
