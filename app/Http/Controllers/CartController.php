<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(Auth::check()){
           $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
               return $cartItem->Id === $request->id;
           });

           if($duplicates->isNotEmpty()){
               return redirect()->route('cart.index')->with('success_message', 'Item was Already in your cart');
           }

           Cart::add($request->id, $request->name, 1, $request->price)
               ->associate('App\Product');

           return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
       }else{
           return back()->with('error_message', 'Login Dulu Ya');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if($validator->fails()){
            session()->flash('errors', collect(['Quantity must be between 1-10']));
            return response()->json(['success'=>false], 500);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success_message', 'Quantity Sucessfully Updated');
        return response()->json(['success'=> true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item deleted');
    }
}
