<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function orderHistory()
    {
        $orders = self::orderHistoryDefault(Auth::id());
        return view('frontend.order.order-history', compact('orders'));
    }

    public static function orderHistoryDefault($id)
    {
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return $orders;
    }

}
