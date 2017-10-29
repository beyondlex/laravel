<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OrderPaid as OrderPaidNotification;

class OrderPaidSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    public function onOrderPaid($event) {

        //event handler:
        /** @var OrderPaid $orderPaidEvent */
        $orderPaidEvent = $event;
        $orderPaidEvent->order->user->notify(new OrderPaidNotification($orderPaidEvent->order));


        //other event handlers:
        //...
    }

    public function subscribe($events) {
        $events->listen(OrderPaid::class, self::class.'@onOrderPaid');
    }
}
