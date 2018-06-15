<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Product;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::inRandomOrder()->take(3)->get();

        $trending = Product::inRandomOrder()->take(2)->get();

        return view('landing-page')->with([
            'products' => $products,
            'trending' => $trending,
        ]);
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function storeContact(Request $request){
        Contact::create($request->all());

        return back()->with('success_message', 'Your Message Has Been Sent!');
    }

}
