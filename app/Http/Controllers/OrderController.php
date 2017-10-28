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
        $order = new Order();
        $order->id = 1;
        $order->order_no = 'LEX00001';
        $user->notify(new OrderPaid($order));
    }
}
