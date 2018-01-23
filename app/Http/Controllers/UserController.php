<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Session;
use App\Cart_Product;
use App\Product;



class UserController extends Controller
{
    public function getSignup()
    {
    	return view('user.signup');
    }

    public function postSignup(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'email|required|unique:users',
    		'password' => 'required|min:4'
    	]);
    	$user = new User([
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password'))
    	]);
    	$user->save();
    	Auth::login($user);
        if (Session::has('myUrl'))
        {
            $myUrl = Session::get('myUrl');
            Session::forget('myUrl');
            return redirect()->to($myUrl);
        }
    	return redirect()->route('product.index');
    }

    public function getLogin()
    {
    	return view('user.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'email|required',
    		'password' => 'required|min:4'
    	]);
    	
    	if(Auth::attempt(['email' => $request->input('email') , 'password' => $request->input('password')]))
    	{
            $loginUser = User::where('email','=',$request->input('email'))->first();
            $login_user_id = $loginUser->id;
            Session::put('login_user_id',$login_user_id);
            if (Session::has('myUrl'))
            {
                $myUrl = Session::get('myUrl');
                Session::forget('myUrl');
                return redirect()->to($myUrl);
            }
    		return redirect()->route('product.index');
    	}
    	return redirect()->back();
    }

    public function getProfile()
    {
        $user_id = Auth::user()->id;
        $checkoutItems = Cart_Product::where('user_id', "=" , $user_id)->get();
        $allProducts = array();
        $count = 0;
        $totalPrice = 0;
        foreach ($checkoutItems as $item)
        {
            $product_id = $item->product_id;
            $quantity = $item->quantity;
            $price = $item->price;
            $product_details = Product::where('id' , '=' , $product_id)->first();
            $title = $product_details->title;
            $allProducts[$count]= array('product_id' => $product_id ,'quantity' => $quantity
            , 'price' => $price , 'title' => $title);
            $count++;
            $totalPrice += $item->price;
        }
        return view('user.profile',['allProducts' => $allProducts , 'totalPrice' => $totalPrice]);
    }

    public function getLogout()
    {
        Session::forget('login_user_id');
    	Auth::logout();
    	return redirect()->route('user.login');
    }
}
