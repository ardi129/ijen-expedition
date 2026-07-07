<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::published()
            ->latest('published_at')
            ->paginate(12);

        return view('pages.articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        if (! $article->is_published) {
            abort(404);
        }

        $article->increment('view_count');

        $latestArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.articles.show', compact('article', 'latestArticles'));
    }
}
