<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = UserOrder::orderBy('id', 'DESC')->get();
        return view('backend.orders.index', compact('orders'));
    }
    public function statusChange(Request $request, $id)
    {
        $order = UserOrder::findOrFail($id);
        $order->status = $request->status;
        $order->update();

        return redirect()->route('user.order')->with('success', 'Order Status Updated!');
    }
}
