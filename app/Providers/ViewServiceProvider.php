<?php
namespace App\Providers;

use App\Enums\EventState;
use App\Models\EventModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer(
            [
                'auth.login',
                'auth.register',
                'about',
                'help',
                'hospitality-and-tours',
                'index',
                'participant',
                'sponsor',
                'exhibitor.index',
            ],
            function (\Illuminate\View\View $view) {
                $statesToShow = [
                    EventState::Registration->value,
                    EventState::ParticipationAndRegistration->value,
                ];
                $latestEvents = [];
                $latestEventsModels = EventModel::whereIn('state', $statesToShow)
                    ->latest()
                    ->take(4)
                    ->get();
                foreach ($latestEventsModels as $event) {
                    $latestEvents[] = [
                        'id' => $event->id,
                        'title' => $event->linkTitle,
                        'url' => route('event.index', ['event' => $event->id]),
                    ];
                }

                $view->with('latestEvents', $latestEvents);
            }
        );
    }
}
