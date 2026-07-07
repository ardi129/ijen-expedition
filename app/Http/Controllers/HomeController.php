<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ContentBlock;
use App\Models\Destination;
use App\Models\HeroSlide;
use App\Models\HomeStat;
use App\Models\PackageGroup;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $heroSlides = HeroSlide::active()->ordered()->get();

        $allPackages = TourPackage::with(['category'])
            ->orderBy('sort_order')
            ->get();

        $packageGroups = PackageGroup::active()->ordered()->get()
            ->mapWithKeys(function ($group) use ($allPackages) {
                $filtered = $allPackages->filter(function ($p) use ($group) {
                    $match = false;

                    if ($group->filter_type === 'duration') {
                        $match = (int) $p->duration_days === (int) $group->filter_value;
                    } elseif ($group->filter_type === 'category') {
                        $match = $p->category?->slug === $group->filter_value;
                    }

                    if ($match && $group->exclude_filter_type && $group->exclude_filter_value) {
                        if ($group->exclude_filter_type === 'category') {
                            $match = $p->category?->slug !== $group->exclude_filter_value;
                        } elseif ($group->exclude_filter_type === 'duration') {
                            $match = (int) $p->duration_days !== (int) $group->exclude_filter_value;
                        }
                    }

                    return $match;
                });

                return $filtered->isNotEmpty()
                    ? [$group->name => ['packages' => $filtered, 'meta' => $group]]
                    : [];
            });

        $destinations = Destination::where('is_featured', true)
            ->orderBy('sort_order')
            ->get();

        $latestArticles = Article::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $contentBlocks = ContentBlock::active()->get()->keyBy('key');

        $homeStats = HomeStat::active()->ordered()->get();

        return view('pages.home', compact(
            'heroSlides',
            'packageGroups',
            'destinations',
            'latestArticles',
            'contentBlocks',
            'homeStats',
        ));
    }
}
