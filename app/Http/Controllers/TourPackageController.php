<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TourPackageController extends Controller
{
    public function index(Request $request): View
    {
        $query = TourPackage::with(['category', 'destinations'])
            ->orderBy('sort_order');

        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('short_description', 'like', "%{$searchTerm}%")
                    ->orWhereHas('destinations', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%{$searchTerm}%");
                    });
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('duration')) {
            if ($request->duration === '4+') {
                $query->where('duration_days', '>=', 4);
            } else {
                $query->where('duration_days', (int) $request->duration);
            }
        }

        $packages = $query->paginate(9)->withQueryString();
        $categories = Category::orderBy('sort_order')->get();

        return view('pages.packages.index', compact('packages', 'categories'));
    }

    public function show(TourPackage $tourPackage): View
    {
        $tourPackage->load(['category', 'destinations', 'approvedReviews']);

        $relatedPackages = TourPackage::with('category')
            ->where('category_id', $tourPackage->category_id)
            ->where('id', '!=', $tourPackage->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $faqs = Faq::active()->get();

        return view('pages.packages.show', compact('tourPackage', 'relatedPackages', 'faqs'));
    }
}
