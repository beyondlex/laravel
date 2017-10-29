<?php

namespace App\Http\Controllers;

use App\Notifications\OrderPaid;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    function paid() {
        /** @var User $user */
        $user = User::find(1);

        //using notify directly:
//        $order = new Order();
//        $order->id = 1;
//        $order->order_no = 'LEX00002';
//        $user->notify(new OrderPaid($order));//OrderPaid is a Notification

        //using event:
        $order = factory(Order::class)->create();
        event(new \App\Events\OrderPaid($order));//OrderPaid is an Event
    }
}
