<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;



class ProductController extends Controller
{
    public function getOneOrGetById(Request $request ,$category_id = null ){
        if($category_id){
            $product = Product::join('tbl_category','tbl_product.category_id','=','tbl_category.id')
            ->where('tbl_product.category_id',$category_id)
            ->first();
            return response()->json([
                'messeger'=>'success',
                'data'=>$product ,
                'statusCode' => 200 ,
            ],200);
        }else{
            $product = Product::all();
            return response()->json([
                'messeger'=>'success',
                'data'=>$product ,
                'statusCode' => 200 ,
            ],200);
        }
        
    }
    public function create(Request $request ){
       

        $categoryExist = Category::find($request->category_id);
        if(!$categoryExist){
            return response()->json([
                'messeger'=>'Category not Exits !',
                'statusCode' => 400
            ],400);
        }else{
            $product = new Product();
            $product->product_number =  $request->product_number;
            $product->product_name = $request->product_name;
            $product->product_unit = $request->product_unit;
            $product->product_price = $request->product_price;
            $product->category_id = $request->category_id;
            $product->save();
            return response()->json([
                'messeger'=>'Success !',
                'statusCode'=>200,
            ],200);
        }
        
    

    }
}
