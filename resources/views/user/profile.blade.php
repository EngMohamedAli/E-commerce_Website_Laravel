@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <center><h1>User Profile</h1></center>
            <hr>
            <center><h2>My Orders</h2></center>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($allProducts as $product)
                            <li class="list-group-item">
                                <span class="badge big">{{ $product['price'] }} &nbspEGP</span>
                                <strong>{{ $product['title'] }} | {{ $product['quantity'] }} Units</strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <center><h2>Total Price</h2><strong class="badge big">{{ $totalPrice }} EGP</strong></center>
                </div>
            </div>
        </div>
    </div>
@endsection