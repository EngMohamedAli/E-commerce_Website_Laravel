<?php

namespace App\Http\Controllers;

use App\Cart;
use App\MyCart;
use App\Product;
use App\Order;
use App\Cart_Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Database\Eloquent\Model;

class OrderCartController extends Controller
{
    public function getAddToCart(Request $request , $id)
    {
    	$product = Product::find($id);
    	$myCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new MyCart($myCart);
    	$cart->addNewItem($product , $product->id);
    	$request->session()->put('cart', $cart);
    	return redirect()->route('product.index');
    }

     public function getShoppingCart(Request $request)
    {
    	if (!Session::has('cart'))
    	{
            return view('cart.shopping-cart');
        }
        $myCart = Session::get('cart');
        $cart = new MyCart($myCart);
        return view('cart.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getIncreaseByOne($id)
    {
        $myCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new MyCart($myCart);
        $cart->increaseByOne($id);
        if (count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->route('orderCart.shopping-cart');
    }

    public function getDecreaseByOne($id)
    {
        $myCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new MyCart($myCart);
        $cart->decreaseByOne($id);
        if (count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->route('orderCart.shopping-cart');
    }

    public function getRemoveItem($id)
    {
        $myCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new MyCart($myCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->route('orderCart.shopping-cart');
    }

    public function getEmptyCart()
    {
        $myCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new MyCart($myCart);
        $cart->emptyCart();
        Session::forget('cart');
        return redirect()->route('orderCart.shopping-cart');
    }

    public function getCheckout()
    {
        if (!Session::has('cart'))
        {
            return view('cart.shopping-cart');
        }
        $myCart = Session::get('cart');
        $cart = new MyCart($myCart);
        $total = $cart->totalPrice;
        return view('cart.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('orderCart.shopping-cart');
        }
        $login_user_id = Session::get('login_user_id');
        $myCart = Session::get('cart');
        $FullCart = new MyCart($myCart);
        $saveCart = new Cart();
        $saveCart->user_id = $login_user_id;
        Auth::user()->carts()->save($saveCart);

        $cart = Cart::orderBy('created_at', 'desc')->first();
        $CartItems = $FullCart->items;
        foreach ($CartItems as $cart_item)
        {
            $cartProduct = new Cart_Product();
            $cartProduct->user_id = $login_user_id;
            $cartProduct->cart_id = $cart->id;
            $cartProduct->product_id = $cart_item['item']['id'];
            $cartProduct->quantity = $cart_item['quantity'];
            $cartProduct->price = $cart_item['price']; //* $cart_item['item']['quantity'];
            Auth::user()->cart_products()->save($cartProduct);
        }

        $order = new Order();
        $order->user_id = $login_user_id;
        $order->cart_id = $cart->id;
        $order->address = $request->input('address');
        $order->name = $request->input('name');   
        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}
