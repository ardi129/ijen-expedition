<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, TourPackage $tourPackage): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        $tourPackage->reviews()->create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_visible' => true,
        ]);

        return back()->with('success', 'Review berhasil dikirim. Terima kasih atas partisipasi Anda!');
    }
}
