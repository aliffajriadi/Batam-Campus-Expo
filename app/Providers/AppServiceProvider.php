<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\EventSetting;
use App\Models\TicketStatus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Global view composer for event settings and ticket status
        View::composer('*', function ($view) {
            $globalSettings = Cache::tags(['event_settings'])->remember('global_event_settings', 3600, function () {
                return EventSetting::first() ?? new EventSetting([
                    'location_event' => 'Mega Mall Batam Center, Lt. 3',
                    'name_event' => 'Batam Campus Expo 2026',
                    'start_event' => now(),
                    'end_event' => now()->addMonth()->addDays(3),
                    'no_contact' => '081234567890',
                    'google_maps' => '',
                    'desc_event' => 'Batam Campus Expo 2026 adalah pameran pendidikan terbesar di Kepulauan Riau.',
                ]);
            });

            $globalTicketStatus = Cache::tags(['tickets'])->remember('global_ticket_status', 3600, function () {
                return TicketStatus::first() ?? new TicketStatus(['status' => 'open']);
            });

            $view->with([
                'lokasi' => $globalSettings->location_event,
                'nama_event' => $globalSettings->name_event,
                'end_event' => $globalSettings->end_event instanceof \DateTime ? $globalSettings->end_event->format('Y-m-d H:i:s') : $globalSettings->end_event,
                'no_contact' => $globalSettings->no_contact,
                'nohp' => $globalSettings->no_contact,
                'google_maps' => $globalSettings->google_maps ?? '',
                'desc_event' => $globalSettings->desc_event,
                'ticket_status' => $globalTicketStatus->status,
            ]);
        });
    }
}
