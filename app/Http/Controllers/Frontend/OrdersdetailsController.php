<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
class OrdersdetailsController extends Controller
{
    public function index($id)
{
    $order = OrderDetail::find($id);

    if (!$order) {
        return redirect()->route('myaccount')->with('error', 'Order not found.');
    }

    // Example: handle product_ids
    $productIds = [];

    if ($order->product_ids) {
        $productIds = json_decode($order->product_ids, true);
        if (!is_array($productIds)) {
            $productIds = explode(',', str_replace(['[', ']'], '', $order->product_ids));
        }
    }

    $productIds = array_filter(array_map('trim', $productIds));
    $products = \App\Models\ProductDetail::whereIn('id', $productIds)->get();

    return view('frontend.orderdetails', compact('order', 'products'));
}

}

