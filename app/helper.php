<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function presentPrice($price){
    return "Rp".number_format($price, 2);
}

function getNumbers(){
    $newSubtotal = (Cart::subtotal());

    $newTotal = $newSubtotal;

    return collect([
        'newSubtotal' => $newSubtotal,
        'newTotal' => $newTotal,
    ]);
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}