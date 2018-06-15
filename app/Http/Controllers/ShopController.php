<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 3;

        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function ($query){
            $query->where('slug', request()->category);
            })->paginate($pagination);
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        }else{
            $products = Product::take(3)->paginate(3);
            $categories = Category::all();
            $categoryName = 'Featured';
        }


        return view('shop')->with([
            'products' => $products ,
            'categories' => $categories  ,
            'categoryName' => $categoryName
        ]);
    }

    /**
     * @param string slug
     * @return \Illuminate\Http\Response
     */

   public function show($slug){

        $product = Product::where('slug', $slug)->firstOrFail();

        $mightAlsoLike = Product::where('slug','!=', $slug)->inRandomOrder(3)->take(3)->get();

        return view('product')->with([
            'product'=> $product,
            'mightAlsoLike'=>$mightAlsoLike,
            ]);
   }

   public function search(Request $request){

        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->paginate(3);
        return view('search-result')->with('products', $products);
   }
}
