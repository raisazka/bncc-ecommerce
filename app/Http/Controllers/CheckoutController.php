<?php

namespace App\Http\Controllers;


use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use function foo\func;
use Gloudemans\Shoppingcart\Facades\Cart;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
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
    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try{
            $charge = Stripe::charges()->create([
            'amount' => Cart::total(),
             'currency' => 'idr',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ],
            ]);

            $order =  $this->addToOrdersTables($request, null);
            Mail::to($request->email)->send(new OrderPlaced($order));



            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index');

        }catch (CardErrorException $e){
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! '.$e->getMessage());
        }

    }

    protected function addToOrdersTables($request, $error){
        //Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address'=> $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->PostalCode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        //Insert into order product table
        foreach (Cart::content() as $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty
            ]);
        }

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
