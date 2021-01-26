<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class PagesController extends Controller
{
    public function home(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function services(){

        $products = Product::get();/*DB::table('products')
                    ->get();*/

        $manage_products = view('pages.services')
                            ->with('products', $products);


        return view('layouts.app')
                ->with('pages.services', $manage_products);
        //return view('pages.services');
    }
}
