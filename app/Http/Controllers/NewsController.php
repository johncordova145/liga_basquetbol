<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $noticias = News::where('publicado', true)->latest()->get();
        return view('public.news.index', compact('noticias'));
    }
}