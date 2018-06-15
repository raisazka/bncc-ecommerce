
@extends('layouts.app')

@section('extra-css')
    <link href="{{ URL::asset('css/cssHomepage.css')}}" rel="stylesheet">
@endsection
@section('content')

    {{--@foreach($products as $product)--}}
    {{--<div class="product">--}}
    {{--<a href="{{route('shop.show', $product->slug)}}"><img src="{{ productImage($product->image) }}" alt="product" height="120" width="120"></a>--}}
    {{--<a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{$product->name}}</div></a>--}}
    {{--<div class="product-price">{{$product->presentPrice()}}</div>--}}
    {{--</div>--}}

    {{--@endforeach--}}
    <main>
        <div class="part1">
            <h1>New Season<br>
                New Arrival
            </h1>
            <center>
                <a href="{{route('shop.index')}}">
                    <input type="submit" value="Shop Now!">
                </a>
            </center>
        </div>


        <div class="part2">
            <center><h1>Categories</h1></center>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="Carousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="row">
                                        <div class="grid-container">
                                            <div class="center-block">
                                                <a href="{{route('shop.index')}}" class="thumbnail center-block"><img src="icon/hoddie.png" alt="Image">
                                                    <h4>Kaos</h4>
                                                </a>
                                            </div>

                                            <div class="center-block">
                                                <a href="{{route('shop.index')}}" class="thumbnail center-block"><img src="icon/sport-shoe.png" alt="Image"">
                                                    <h4>Tas</h4>
                                                </a>
                                            </div>

                                            <div class="center-block">
                                                <a href="{{route('shop.index')}}" class="thumbnail center-block"><img src="icon/women-top.png" alt="Image"">
                                                    <h4>Kutang</h4>
                                                </a>
                                            </div>

                                            <div class="center-block">
                                                <a href="{{route('shop.index')}}" class="thumbnail center-block"><img src="icon/trousers.png" alt="Image"">
                                                    <h4>Celana</h4>
                                                </a>
                                            </div>
                                        </div><!--.grid container-->
                                    </div><!--.row-->
                                </div><!--.item-->


                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->
        </div>

        <div class="part3">
            <center><h1>BestSeller</h1></center><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="Carousel2" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#Carousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel2" data-slide-to="1"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="row">
                                        <div class="grid-container">
                                            @foreach($products as $product)
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


                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#Carousel2" class="left carousel-control">‹</a>
                            <a data-slide="next" href="#Carousel2" class="right carousel-control">›</a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->
        </div>

        <div class="part4 container">
            <center><h1>Trending Now</h1></center><br>
            <div class="grid-container2">
                @foreach($trending as $product)
                <div class="grid-item2 center-block">
                        <a href="{{route('shop.show', $product->slug)}}"><img class="ProductPic" src="{{ productImage($product->image) }}" alt="product"></a>
                </div>
                @endforeach
            </div>
            <center>
                <a href="{{route('shop.index')}}">
                    <input type="submit" value="Explore More!">
                </a>
            </center>
        </div>
    </main>

@endsection