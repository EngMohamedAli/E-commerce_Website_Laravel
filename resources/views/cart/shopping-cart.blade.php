@extends('layouts.master')

@section('title')
    Shopping Cart Page
@endsection

@section('content')
    @if(Session::has('cart'))
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
                                    <li>
                                        <a href="{{ route('orderCart.increase-by-one', ['id' => $product['item']['id']]) }}">Increase
                                            by 1</a></li>
                                    <li>
                                        <a href="{{ route('orderCart.decrease-by-one', ['id' => $product['item']['id']]) }}">Decrease
                                            by 1</a></li>
                                    <li><a href="{{ route('orderCart.remove', ['id' => $product['item']['id']]) }}">Remove
                                            Item</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <center><h2>Total Price : {{ $totalPrice }} EGP</h2></center>
            </div>
        </div>
        <hr>
        <div class="row">
            <center>
                <div class="col-sm-6 col-md-3 col-md-offset-3 col-sm-offset-3 chk">
                    <a href="{{ route('orderCart.checkout') }}" type="button" class="btn btn-success">Checkout</a>
                </div>
            </center>
            <div class="col-sm-6 col-md-3 col-md-offset-3 col-sm-offset-3 emp">
                <a href="{{ route('orderCart.empty-cart') }}" type="button" class="btn btn-success">Empty My Cart</a>
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