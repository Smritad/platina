<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Wishlist;
use App\Models\Cart;


class WishlistController extends Controller
{
    // Show wishlist items
    public function index()
    {
        $user = auth('frontend')->user();
        $sessionId = session()->getId();

        if ($user) {
            // Migrate guest wishlist to user
            Wishlist::where('session_id', $sessionId)
                    ->update(['user_id' => $user->id, 'session_id' => null]);

            $wishlistProductIds = Wishlist::where('user_id', $user->id)
                                          ->pluck('product_id');
        } else {
            $wishlistProductIds = Wishlist::where('session_id', $sessionId)
                                          ->pluck('product_id');
        }

        $wishlistProducts = ProductDetails::whereIn('id', $wishlistProductIds)->get();

        return view('frontend.wishlist-details', compact('wishlistProducts'));
    }

    // Add product to wishlist
    public function add($productId)
    {
        $user = auth('frontend')->user();
        $sessionId = session()->getId();
        // dd($sessionId);

        if ($user) {
            Wishlist::updateOrCreate(
                ['user_id' => $user->id, 'product_id' => $productId]
            );
        } else {
            Wishlist::updateOrCreate(
                ['session_id' => $sessionId, 'product_id' => $productId]
            );
        }

    return back()->with('message', 'Product added to wishlist.');
    }

    // Remove product from wishlist
    public function remove($productId)
    {
        $user = auth('frontend')->user();
        $sessionId = session()->getId();

        if ($user) {
            Wishlist::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->delete();
        } else {
            Wishlist::where('session_id', $sessionId)
                    ->where('product_id', $productId)
                    ->delete();
        }

        return back()->with('message', 'Product removed from wishlist.');
    }

    public function moveToCart(Request $request, $productId)
{
    $product = ProductDetails::findOrFail($productId);

    $user = auth('frontend')->user();
    $userId = $user ? $user->id : null;
    $sessionId = $user ? null : session()->getId();

    // Add to Cart
    $existingCart = Cart::where('product_id', $product->id)
        ->where('user_id', $userId)
        ->where('session_id', $sessionId)
        ->where('size', 'N/A') // default
        ->where('color', 'N/A') // default
        ->first();

    if ($existingCart) {
        $existingCart->quantity += 1;
        $existingCart->save();
    } else {
        Cart::create([
            'user_id'       => $userId,
            'session_id'    => $sessionId,
            'product_id'    => $product->id,
            'product_name'  => $product->product_name,
            'price'         => $product->mrp,
            'image'         => json_decode($product->media_files, true)[0] ?? '',
            'size'          => 'N/A',
            'color'         => 'N/A',
            'fabric'        => 'N/A',
            'quantity'      => 1,
        ]);
    }

    // Remove from Wishlist
    Wishlist::where('product_id', $productId)
        ->when($userId, fn($q) => $q->where('user_id', $userId))
        ->when(!$userId, fn($q) => $q->where('session_id', $sessionId))
        ->delete();

    return redirect()->back()->with('message', 'Product moved to cart.');
}
}
