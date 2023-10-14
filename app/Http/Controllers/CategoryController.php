<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function getall(Request $request){
        $Category = Category::all();
        if(!$Category){
            return response()->json([
                'messeger'=>'Category Not Found!',
                'statusCode'=>404,
            ],404);
        }
    
        return response()->json([
            'data'=>$Category,
            'statusCode' => 200
        ],200);
    }
    
}
