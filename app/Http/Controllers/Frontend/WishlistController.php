<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\Wishlist;

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
}
