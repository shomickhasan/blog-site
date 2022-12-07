<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Blogpost;


class HomeController extends Controller
{
    //for home page 
    public function home(){
        $blogs = Blogpost::orderBy('created_at', 'DESC')->take(5)->get();
        $blogs = $blogs->splice(2);
        $restntpost = Blogpost::with('category','users')->orderBy('created_at', 'DESC')->paginate(9);
        return view('frontend.home',compact('blogs','restntpost'));
    }
   
}
