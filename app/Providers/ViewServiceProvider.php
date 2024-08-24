<?php
namespace App\Providers;

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
            '*',
            function (\Illuminate\View\View $view) {
                $latestEvents = [];
                $latestEventsModels = EventModel::latest()->take(4)->get();
                foreach ($latestEventsModels as $event) {
                    $latestEvents[] = [
                        'id' => $event->id,
                        'title' => $event->linkTitle,
                        'url' => route('event.index', ['event' => $event->id]),
                    ];
                }

                $view->with('latestEvents', $latestEvents);
                $view->with('event', EventModel::latest()->first());
            }
        );
    }
}
