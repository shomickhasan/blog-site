<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Category;
use Illuminate\Support\Str;
use App\Models\Backend\Blogpost;
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

    // add new category form api

    public function CategoryStore(Request $request){
        $category = new Category;
        $category->name  = $request->name;
        $category->slug  = Str::slug($request->name);
        $category->drescreption  = $request->drescreption;
        $category->save();
        if($category){
            return response()->json([
                'message'=>'Category Save',
                'status'=>'200'
            ]);
        }
        else{
            return response()->json([
                'message'=>'happen ishues',
                'status'=>'400',
            ]);

        }


    }
    // show blog post by api
    public function showBlog(){

            $blogs = Blogpost::orderBy("created_at",'DESC')
            ->where('status',1)
            ->get();
            if($blogs){
                return response()->json([
                    'blogs'=> $blogs,
                    'status'=>'200',
                ]);
            }

        else{
            return response()->json([
                'message'=> 'error happining',
                'status'=>'400',
            ]);
        }

    }
}
