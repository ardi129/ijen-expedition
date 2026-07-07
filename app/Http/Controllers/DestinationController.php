<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function index(): View
    {
        $destinations = Destination::orderBy('sort_order')->paginate(12);
        $featuredDestination = Destination::where('is_featured', true)
            ->orderBy('sort_order')
            ->first();

        return view('pages.destinations.index', compact('destinations', 'featuredDestination'));
    }

    public function show(Destination $destination): View
    {
        $relatedDestinations = Destination::where('id', '!=', $destination->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('pages.destinations.show', compact('destination', 'relatedDestinations'));
    }
}
