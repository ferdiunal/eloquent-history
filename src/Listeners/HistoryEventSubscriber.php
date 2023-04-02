<?php

namespace Ferdiunal\History\Listeners;

use Ferdiunal\History\Events\ModelChanged;
use Ferdiunal\History\HistoryObserver;
use Ferdiunal\History\History;

class HistoryEventSubscriber
{
    /**
     * Handle the event.
     *
     * @param  ModelChanged  $event
     * @return void
     */
    public function onModelChanged($event)
    {
        if(!HistoryObserver::filter(null)) return;

        $event->model->morphMany(config('history.model'), 'model')->create([
            'message' => $event->message,
            'meta' => $event->meta,
            'user_id' => HistoryObserver::getUserID(),
            'user_type' => HistoryObserver::getUserType(),
            'performed_at' => time(),
        ]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Ferdiunal\History\Events\ModelChanged::class,
            static::class.'@onModelChanged'
        );
    }
}
