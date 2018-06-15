@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
@endsection
@section('content')

    <h1 style="margin-top: 200px; text-align: center; font-weight: bold;">Thank You For Purchasing</h1>
    <button style="display: block; margin: 0 auto;" class="btn btn-danger"><a style="color: white;" href="{{route('landing-page')}}">Home Page</a></button>

@endsection