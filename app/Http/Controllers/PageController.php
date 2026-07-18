<?php

namespace App\Http\Controllers;

use App\Models\ContentBlock;
use App\Models\Faq;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function faq(): View
    {
        $faqsByCategory = Faq::active()
            ->get()
            ->groupBy('category');

        return view('pages.faq', compact('faqsByCategory'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function terms(): View
    {
        $terms = ContentBlock::where('key', 'terms-conditions')->first();

        return view('pages.terms', compact('terms'));
    }

    public function privacy(): View
    {
        $privacy = ContentBlock::where('key', 'privacy-policy')->first();

        return view('pages.privacy', compact('privacy'));
    }
}
