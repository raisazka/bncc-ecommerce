@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/styleCart.css')}}">
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sidenav col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="{{route('user')}}" style="color: white;">MY ACCOUNT</a>
                    <a href="{{route('wishlist.index')}}"  style="color: white;">WISHLIST</a>
                    <a href=""  style="color: white;">CART</a>
                </div>
                <div class="content col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="MyCart">
                        <p id="MyCartid">My Cart</p>
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
                    @if(Cart::count() > 0)
                        <h2>{{Cart::count()}} Item(s) in Shopping Cart</h2>
                    @else
                        <h3>No items in cart</h3>
                    @endif
                @foreach(Cart::content() as $item)

                        <div class="IsiCart col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px;">
                                    <p id="NamaProduk">{{$item->model->name}}</p>
                                    <div class="GambarProduk col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <a href="{{route('shop.show', $item->model->slug)}}"><img src="{{ productImage($item->model->image) }}" alt="item"></a>
                                    </div>
                                    <div class="keterangan_produk col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <p id="jumlahProduk">Jumlah Produk</p>
                                        <select name="" id="" class="quantity" data-id="{{$item->rowId}}">
                                            @for($i=1 ; $i < 10 +1; $i++)
                                                <option value="{{$i}}" {{$item->qty == $i ? 'selected' :'' }}>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="keterangan_pengiriman col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        {!! $item->model->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <div class="HargaBarang">
                                    <p name="Harga Barang">{{$item->model->presentPrice()}}</p>
                                </div>
                                <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <input id="deleteBtn" type="submit" value="X" name="deleteBtn">
                                </form>
                            </div>
                            <br>
                        </div>
                @endforeach
                    <!-- End of list 1 -->
                </div>
                <h1 style="text-align:center;">Total: Rp{{Cart::subtotal()}}</h1>
                <br>
                <button class="btn" style="display: block; margin: 0 auto; margin-bottom: 20px;"><a style="color: whitesmoke;" href="{{route('checkout.index')}}">Proceed to check out</a></button>
            </div>
        </div>
    </main>

@endsection

@section('extra-js')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        (function () {
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function (element) {
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id');
                    axios.patch(`/cart/${id}`,
                        {
                        quantity: this.value
                        })
                        .then(function (response) {
                            console.log(response);
                            window.location.href='{{route('cart.index')}}'
                        })
                        .catch(function (error) {
                            console.log(error.response);
                            window.location.href='{{route('cart.index')}}'
                        });
                })
            })
        })();
    </script>

@endsection