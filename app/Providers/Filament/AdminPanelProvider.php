<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Pages\MediaGallery;
use App\Filament\Widgets\StatsOverview;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('IJEN Expedition')
            ->brandLogo(fn () => view('filament.brand'))
            ->brandLogoHeight('2.5rem')
            ->colors([
                'primary' => '#1a3a5c',
                'accent' => '#e87a2f',
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('5rem')
            ->sidebarWidth('16rem')
            ->databaseNotifications()
            ->defaultThemeMode(ThemeMode::Light)
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Konten')
                    ->icon(Heroicon::OutlinedRectangleStack)
                    ->collapsible(false),
                NavigationGroup::make()
                    ->label('Transaksi')
                    ->icon(Heroicon::OutlinedCurrencyDollar)
                    ->collapsible(false),
                NavigationGroup::make()
                    ->label('Pengaturan')
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->collapsed(),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
                MediaGallery::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                StatsOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
