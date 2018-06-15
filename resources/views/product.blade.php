@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/styleDispayProduct.css')}}">
@endsection

@section('content')

    <div class="part1">
        <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="display col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="gallery">
                    <img class="foto-produk" src="{{ productImage($product->image) }}" alt="product" height="200" width="200" style="margin-left: 50px; margin-top: 30px;"><br>
                    <h1 style="margin-left: 30px;">{{$product->name}}</h1>
                </div>
            </div>
            <div class="description col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <!-- Notification -->
                @if(session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{session()->get('error_message')}}
                    </div>
                @endif
                <!-- End of Notification -->
                <br>
                <br>
                {!! $product->description !!}
                <br>
                <br>
                {{$product->presentPrice()}}
                <br>
                <br>
                <form action="{{route('cart.store')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
                <br>
                <form action="{{route('wishlist.store')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button type="submit" class="btn">Add to Wishlist</button>
                </form>
            </div>
        </div>
    </div>
    <div class="part3">
        <br><br><br>
        <center><h1>You Might Also Like</h1></center><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="Carousel2" class="carousel slide">

                        <ol class="carousel-indicators">
                            <li data-target="#Carousel2" data-slide-to="0" class="active"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <div class="row">
                                    <div class="grid-container">
                                        @foreach($mightAlsoLike as $product)
                                            <div class="grid-item center-block">
                                                <a href="{{route('shop.show', $product->slug)}}"><img class="ProductPic" src="{{ productImage($product->image) }}" alt="product"></a>
                                                {{$product->name}}<br>
                                                {{$product->details}}<br>
                                                {{$product->presentPrice()}}<br>
                                            </div>
                                        @endforeach
                                    </div>
                                </div><!--.row-->
                            </div><!--.item-->
                            <br>
                            <center>
                                <a href="{{route('shop.index')}}"><input type="submit" value="Show More"></a>
                            </center>

                        </div><!--.carousel-inner-->
                        <a data-slide="prev" href="#Carousel2" class="left carousel-control">‹</a>
                        <a data-slide="next" href="#Carousel2" class="right carousel-control">›</a>
                    </div><!--.Carousel-->

                </div>
            </div>
        </div><!--.container-->
    </div>


@endsection