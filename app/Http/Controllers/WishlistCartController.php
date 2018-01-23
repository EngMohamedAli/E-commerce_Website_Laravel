<?php

namespace App\Http\Controllers;

use App\Cart;
use App\MyCart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class WishlistCartController extends Controller
{
    public function getAddToWishlistCart(Request $request , $id)
    {
        $product = Product::find($id);
        $myCart = Session::has('wishlist_cart') ? Session::get('wishlist_cart') : null;
        $cart = new MyCart($myCart);
        $cart->addNewItem($product , $product->id);
        $request->session()->put('wishlist_cart', $cart);
        return redirect()->route('product.index');
    }

    public function getShoppingWishlistCart(Request $request)
    {
        if (!Session::has('wishlist_cart'))
        {
            return view('cart.shopping-wishlist-cart');
        }
        $myCart = Session::get('wishlist_cart');
        $cart = new MyCart($myCart);
        return view('cart.shopping-wishlist-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getEmptyWishlistCart()
    {
        $myCart = Session::has('wishlist_cart') ? Session::get('wishlist_cart') : null;
        $cart = new MyCart($myCart);
        $cart->emptyCart();
        Session::forget('wishlist_cart');
        return redirect()->route('wishlistCart.shopping-wishlist-cart');
    }
}
