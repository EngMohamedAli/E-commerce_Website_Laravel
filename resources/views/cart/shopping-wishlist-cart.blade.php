@extends('layouts.master')

@section('title')
    Shopping Wishlist Cart Page
@endsection

@section('content')
    @if(Session::has('wishlist_cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="quan"><h4>Quantity : </h4></span>
                            <span class="badge">{{ $product['quantity'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-success">{{ $product['price'] }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toogle"
                                        data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('orderCart.AddToCart' , ['id' => $product['item']['id']])}}">Add
                                            To Cart</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr>
        <center><a href="{{ route('wishlistCart.empty-wishlist-cart') }}" type="button" class="btn btn-success">Empty
                Wishlist Cart</a></center>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></center>
                <center><h2>Total Price : {{ $totalPrice }} EGP</h2></center>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <center><h1>No Items in Cart!</h1></center>
            </div>
        </div>
    @endif
@endsection