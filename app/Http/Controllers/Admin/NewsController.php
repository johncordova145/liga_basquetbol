<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::with('author')->latest('created_at')->paginate(12);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create', ['news' => new News()]);
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'is_published']);
        $data['user_id'] = $request->user()->id;
        $data['published_at'] = $request->boolean('is_published') ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), 'news');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Noticia guardada.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'is_published']);

        // Si ya estaba publicada conserva su fecha original; si pasa a borrador, se vacía.
        $data['published_at'] = $request->boolean('is_published') ? ($news->published_at ?? now()) : null;

        if ($request->hasFile('image')) {
            $this->deleteImage($news->image, 'news');
            $data['image'] = $this->storeImage($request->file('image'), 'news');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Noticia actualizada.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->deleteImage($news->image, 'news');
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Noticia eliminada.');
    }
}
