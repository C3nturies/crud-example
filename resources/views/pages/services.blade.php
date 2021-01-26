
@extends('layouts.app')

@section('tittle')
    Services
@endsection

<?php
    $products = DB::table('products')
                    ->get();
?>

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail">
                    <img src="/storage/product_images/{{$product->product_image}}" alt="">
                    <div class="caption">
                        <h3>{{$product->product_name}}</h3>
                <div class="clearfix">
                    <div class="pull-left price">
                        $ {{$product->price}}
                    </div>
                    <a href="" class="btn btn-success pull-right" role="button">Add to cart</a>
                </div>
            </div>
        </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
