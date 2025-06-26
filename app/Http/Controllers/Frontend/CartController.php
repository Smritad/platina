<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\SizeDetails;
use App\Models\FabricType;
use App\Models\Cart;

class CartController extends Controller
{
  
    public function addToCart(Request $request, $id)
{
    $product = ProductDetails::findOrFail($id);

    // Determine user or session
    $userId = auth('frontend')->check() ? auth('frontend')->id() : null;
    $sessionId = !$userId ? session()->getId() : null;

    Cart::create([
        'user_id'       => $userId,
        'session_id'    => $sessionId,
        'product_id'    => $product->id,
        'product_name'  => $request->product_name,
        'price'         => $request->price,
        'image'         => $request->image,
        'size'          => $request->size ?? 'N/A',
        'color'         => $request->selected_color,
        'fabric'        => $request->fabric,
        'quantity'      => $request->qty ?? 1,
    ]);

    return redirect()->back()->with('message', 'Product added to cart');
}


    public function showCart()
    {
        $userId = auth('frontend')->check() ? auth('frontend')->id() : null;
        $sessionId = !$userId ? session()->getId() : null;

        $cartItems = Cart::when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })
            ->when(!$userId, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->get();

        return view('frontend.cart-details', compact('cartItems'));
    }

    public function removeFromCart($id)
    {
        $item = Cart::find($id);
        if ($item) {
            $item->delete();
            return response()->json(['success' => true, 'message' => 'Item removed']);
        }
        return response()->json(['success' => false, 'message' => 'Item not found']);
    }


public function buyNow(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:product_details,id',
        'product_name' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|string',
        'fabric' => 'nullable|string',
        'selected_color' => 'required|string',
        'size' => 'required|string',
        'qty' => 'required|integer|min:1',
    ]);

    session()->put('buy_now_product', $validated);

    return response()->json([
        'status' => 'success',
        'redirect_url' => route('show.buy.now.checkout'),
    ]);
}

public function showBuyNowCheckout()
{
    $product = session('buy_now_product');
dd($product);
    if (!$product) {
        return redirect()->back()->with('error', 'No product found for checkout.');
    }

    $cartItems = collect([
        (object) $product
    ]);

    $cartTotal = $product['price'] * $product['qty'];

    return view('frontend.checkout-details', compact('cartItems', 'cartTotal'));
}



}
