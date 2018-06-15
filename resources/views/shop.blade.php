@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/styleProduct.css')}}">
    @endsection

@section('content')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="sidenav col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <form action="" class="filterForm">
                    <h3><b>Categories</b></h3>
                    <div class="verticalLine"></div>
                    @foreach($categories as $category)
                        <a class="kategori" href="{{route('shop.index', ['category' => $category->slug])}}">{{$category->name}}</a><br>
                    @endforeach
                    <br>
                </form>
            </div>
            <div class="content col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="Product col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>{{$categoryName}}</h1>
                    <div class="grid-container">
                        @forelse($products as $product)
                        <div class="grid-item">
                            <a href="{{route('shop.show', $product->slug)}}"><img class="ProductPic" src="{{ productImage($product->image) }}"></a>
                            {{$product->name}}<br>
                            {{$product->presentPrice()}}<br>
                        </div>
                            @empty
                            <p>No Items Found</p>
                            @endforelse
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection