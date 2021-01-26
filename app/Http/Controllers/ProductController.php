<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;
use DB;

class ProductController extends Controller
{
    public function addProduct(){
        return view('admin.addProduct');
    }

    public function editProduct(){
        return view('admin.editProduct');
    }

    public function saveproduct(Request $request){

        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('product_image')){

            $filenameWithExt = $request->file('product_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('product_image')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            //print('<h1>'.$filenameToStore.'<h1>');

            $path = $request->file('product_image')->storeAs('public/product_images', $filenameToStore);

        }else {
            $filenameToStore = 'noimage.png';
        }

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['price']=$request->input('product_price');
        $data['product_image']=$filenameToStore;

        foreach($data as $da){
            print('<h1>'.$da).'</h1><br>';
        }

        DB::table('products')->insert($data);

        Session::put('message', 'Product added sucessfully');

        return redirect::to('/addProduct');

    }

    public function editProductById($id){

        $selectProductById = DB::table('products')->where('id', $id)->first();

        $manageProductById = view('admin.editProduct')->with('selectProductById', $selectProductById);

        return view('layouts.appadmin')->with('admin.editProduct', $manageProductById);

    }

    public function updateProduct(Request $request){

        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['price']=$request->input('product_price');

        if($request->hasFile('product_image')){

            $filenameWithExt = $request->file('product_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension = $request->file('product_image')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('product_image')->storeAs('public/product_images', $filenameToStore);

            $data['product_image']=$filenameToStore;

            $selectImageName = DB::table('products')->where('id', $request->input('product_id'))->first();

            if($selectImageName->product_image != 'noimage.jpg'){
                Storage::delete('/storage/product_images/'.$selectImageName->product_image);
            }

        }

        DB::table('products')->where('id', $request->input('product_id'))->update($data);

        Session::put('message', 'Product updated sucessfully');

        return redirect::to('/addProduct');
    }

    public function deleteProduct($id){

        $selectProductImageNameById = DB::table('products')->where('id', $id)->first();

        if($selectProductImageNameById->product_image != 'noimage.jpg'){
            Storage::delete('/storage/product_images/'.$selectProductImageNameById->product_image);
        }

        DB::table('products')->where('id', $id)->delete();

        Session::put('message', 'Product deleted sucessfully');

        return redirect::to('/addProduct');
    }
}
