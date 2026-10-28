<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News as AdminNews;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = AdminNews::with('author')->latest('created_at')->paginate(12);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create', ['news' => new AdminNews()]);
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'is_published']);
        
        
        $userId = Auth::id();

        if (!$userId) {
            $user = User::first();
            
            if ($user) {
                $userId = $user->id;
            } else {
                $newUser = User::create([
                    'name' => 'Administrador',
                    'email' => 'admin@liga.com',
                    'password' => bcrypt('password123')
                ]);
                $userId = $newUser->id;
            }
        }

        $data['user_id'] = $userId;
        $data['published_at'] = $request->boolean('is_published') ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), 'news');
        }

        AdminNews::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Noticia guardada.');
    }

    public function edit(AdminNews $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, AdminNews $news): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'is_published']);
        $data['published_at'] = $request->boolean('is_published') ? ($news->published_at ?? now()) : null;

        if ($request->hasFile('image')) {
            $this->deleteImage($news->image, 'news');
            $data['image'] = $this->storeImage($request->file('image'), 'news');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Noticia actualizada.');
    }

    public function destroy(AdminNews $news): RedirectResponse
    {
        $this->deleteImage($news->image, 'news');
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Noticia eliminada.');
    }
}