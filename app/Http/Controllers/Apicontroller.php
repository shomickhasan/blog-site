<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Category;

class Apicontroller extends Controller
{
    public function CategoryShow($id=null){
        if($id==""){
            $category = Category::get();
            if($category){
                return response()->json([
                    'category'=>$category,
                    'status'=>200,
                ] );
            }
         }
         else{
            $category= Category::find($id);
            if($category){
                return response()->json([
                    'category'=> $category,
                    'status'=>200,
                ]);
            }
        }
        
    }
}
