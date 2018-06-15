@extends('layouts.app')

@section('content')
<h1>Search Result</h1>
<p>{{$products->count()}} result(s) for {{request()->input('query')}}</p>



@forelse($products as $product)
    <div class="product">
        <a href="{{route('shop.show', $product->slug)}}"><img src="{{ productImage($product->image) }}" alt="product" height="120" width="120"></a>
        <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{$product->name}}</div></a>
        <div class="product-price">{{$product->presentPrice()}}</div>
    </div>
@empty
    <div style="text-align: left;">No items Found</div>
@endforelse

{{$products->links()}}


@endsection