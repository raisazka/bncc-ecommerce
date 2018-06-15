@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/styleWishlist.css')}}">
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sidenav col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="{{route('user')}}" style="color: white;">MY ACCOUNT</a>
                    <a href=""  style="color: white;">WISHLIST</a>
                    <a href="{{route('cart.index')}}"  style="color: white;">CART</a>
                </div>
                <div class="content col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="MyWishlist">
                        <p id="MyWishlistid">My WishList</p>
                    </div>

                    <!-- Notification -->
                    @if(session()->has('success_message'))

                        <div class="alert alert-success">
                            {{session()->get('success_message')}}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif


                    <!-- End of Notification -->
                    @foreach($user as $wish)
                    <div class="IsiWishlist col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="GambarProduk col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="{{route('shop.show', $wish->product->slug)}}"><img src="{{ productImage($wish->product->image) }}" alt="item"></a>
                        </div>
                        <div class="keterangan_produk col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <p id="NamaProduk">{{$wish->product->name}}</p>
                            {{$wish->product->description}}
                        </div>
                        <div class="HargaBarang col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <p name="Harga Barang">{{$wish->product->presentPrice()}}</p>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <form action="{{route('cart.store')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$wish->product->id}}">
                                <input type="hidden" name="name" value="{{$wish->product->name}}">
                                <input type="hidden" name="price" value="{{$wish->product->price}}">
                                <input id="orderBtn" type="submit" value="Add to Cart" name="orderBtn">
                            </form>
                        </div>
                        <form action="{{route('wishlist.destroy', $wish->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" style="margin-top: 40px;" class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                        <br><!-- End of list 1 -->
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection