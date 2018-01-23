@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif

    @foreach($products->chunk(3) as $productRow)
        <div class="row">
            @foreach($productRow as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        @if($product->productType === "sale")
                            <p class="sa">Sale 20%</p>
                        @endif
                        <img src="{{$product->imagePath}}" alt="..." class="img-responsive">
                        <div class="caption">
                            @if($product->productType !== "sale")
                                <br>
                                <center><h3>{{$product->title}}</h3></center>
                            @else
                                <center><h3>{{$product->title}}</h3></center>
                            @endif
                            <div class="clearfix">
                                @if($product->productType !== "sale")
                                    <br>
                                    @if($product->productType === "sale")
                                        <div class="price bef">
                                            {{$product->price}} EGP
                                        </div>
                                        <div class="pull-left price">{{$product->price - $product->price * (20/100)}}
                                            EGP
                                        </div>
                                    @else
                                        <div class="pull-left price">Price {{$product->price}} EGP</div>
                                    @endif
                                    <a href="{{route('orderCart.AddToCart' , ['id' => $product->id])}}"
                                       class="btn btn-success pull-right bt" role="button">Add to Cart</a>
                                    @if($product->productType === "sale")
                                        <a href="{{route('wishlistCart.AddToWishlistCart' , ['id' => $product->id])}}"
                                           class="btn btn-success bt1" role="button">Add to Wishlist</a>
                                    @else
                                        <a href="{{route('wishlistCart.AddToWishlistCart' , ['id' => $product->id])}}"
                                           class="btn btn-success bt" role="button">Add to Wishlist</a>
                                    @endif
                                @else
                                    @if($product->productType === "sale")
                                        <div class="price bef">
                                            {{$product->price}} EGP

                                        </div>
                                        <div class="pull-left price">{{$product->price - $product->price * (20/100)}}
                                            EGP
                                        </div>

                                    @else
                                        <div class="pull-left price">Price {{$product->price}} EGP</div>
                                    @endif
                                    <a href="{{route('orderCart.AddToCart' , ['id' => $product->id])}}"
                                       class="btn btn-success pull-right bt" role="button">Add to Cart</a>
                                    @if($product->productType === "sale")
                                        <a href="{{route('wishlistCart.AddToWishlistCart' , ['id' => $product->id])}}"
                                           class="btn btn-success bt1" role="button">Add to Wishlist</a>
                                    @else
                                        <a href="{{route('wishlistCart.AddToWishlistCart' , ['id' => $product->id])}}"
                                           class="btn btn-success bt" role="button">Add to Wishlist</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <footer class="foot">
        &copy Copyright Saved and Reserved To Mohamed Ali 2017-2018.
    </footer>
@endsection
