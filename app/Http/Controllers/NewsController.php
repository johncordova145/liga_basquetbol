<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // 1. Noticias destacadas
        $featuredNews = News::latest('published_at')->take(4)->get();

        // 2. Consulta de noticias
        $query = News::latest('published_at');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(6);

        // 3. Equipos para el widget lateral de ranking
        $rankingTeams = Team::orderBy('name', 'asc')->take(5)->get();

        // Aseúrate de incluir 'rankingTeams' dentro del compact
        return view('public.news', compact('featuredNews', 'news', 'rankingTeams'));
    }
}