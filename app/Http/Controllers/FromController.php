<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  Session;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use DB ;

class FromController extends Controller
{
    public function show(){
        $access_token = Session::get('access_token') ;
        if($access_token == NULL){
            return view('login');
        }
        $product = DB::table('tbl_product')->join('tbl_category','tbl_product.category_id','=','tbl_category.id')->get();
        $category = DB::table('tbl_category')->get();
         return view('forminput')->with('product',$product)->with('category', $category);
    }
    public function create(Request $request){
        if($request->product_number == null || $request->product_name == null || $request->product_unit ==null|| $request->product_price==null || $request->category_id == null)
        {
            return Redirect::to('/form');

        }
        $product = new Product();
        $product->product_number =  $request->product_number;
        $product->product_name = $request->product_name;
        $product->product_unit = $request->product_unit;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();
        return Redirect::to('/form');

    }
    public function showUpdate( $id){
        $product = DB::table('tbl_product')->where('tbl_product.product_id',$id)->get();
        $category_id = DB::table('tbl_product')->where('tbl_product.product_id',$id)->value('category_id');
        $category = DB::table('tbl_category')->where('id',$category_id)->get();
        return view('updateform')->with('category', $category)->with('product', $product);
    }
    public function update(Request $request , $id){
        if($request->product_number == null || $request->product_name == null || $request->product_unit ==null|| $request->product_price==null )
        {
            return Redirect::to('/form');

        }
        $data = array();
        $data['product_number'] = $request->product_number ;
        $data['product_name'] = $request->product_name ;
        $data['product_unit'] = $request->product_unit ;
        $data['product_price'] = $request->product_price ;
        DB::table('tbl_product')->where('product_id',$id)->update( $data);
        return Redirect::to('/form');
       
    }
    public function delete($id){
        DB::table('tbl_product')->where('product_id',$id)->delete();
        return Redirect::to('/form');
    }

}
