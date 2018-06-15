@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('/css/styleMyAccount.css')}}">
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sidenav col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="" style="color: white;">MY ACCOUNT</a>
                    <a href="{{route('wishlist.index')}}"  style="color: white;">WISHLIST</a>
                    <a href="{{route('cart.index')}}"  style="color: white;">CART</a>
                </div>
                <div class="content col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <div class="ContactInfomation">
                        <p id="CItitile">Contact Information</p>
                    </div>
                    <div class="IsiCI col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="infomrasiCustomer" class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p>Nama:		{{ Auth::user()->name }}<br>
                            <p>E-mail:		{{Auth::user()->email}}<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection