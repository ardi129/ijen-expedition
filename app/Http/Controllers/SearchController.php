<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Destination;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return view('pages.search', [
                'query' => $query,
                'packages' => collect(),
                'destinations' => collect(),
                'articles' => collect(),
            ]);
        }

        $packages = TourPackage::where('title', 'like', "%{$query}%")
            ->orWhere('short_description', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        $destinations = Destination::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        $articles = Article::published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('body', 'like', "%{$query}%");
            })
            ->get();

        return view('pages.search', compact('query', 'packages', 'destinations', 'articles'));
    }
}
