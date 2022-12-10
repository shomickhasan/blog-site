<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Blogpost;
use  App\Models\Backend\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Nette\Utils\Image;
use Illuminate\Support\Facades\File;;
use App\Models\Backend\Tag;

class BlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.pages.blogpost.blogadd',compact('categories','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //manage blog
        $blogs = Blogpost::orderBy('created_at', 'DESC')->paginate(20);
        return view('backend.pages.blogpost.manageblog',compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|unique:blogposts,title',
            'categoryId'=>'required',
            'image'=>'required',
            'drescreption'=>'required',
        ]);
        $blog = new Blogpost();
        $blog->title = $request->title;
        $blog->category_id = $request->categoryId;
        $blog->user_id = auth()->user()->id;
        $blog->short_drescreption = $request->short_drescreption;
        $blog->drescreption = $request->drescreption;
        $blog->status = $request->status;
        $blog->slug =  Str::slug($request->title);
        $blog->publish_date = Carbon::now();
        $image = $request->file('image');
        $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
        $location =public_path('backeend/blogimg/'.$imageCustomeName);
        Image::make( $image)->save($location);
        $blog->image= $imageCustomeName;
        //many to many table
       // $blog->tags()->attach($request->tags);
        if($blog){
            $blog->save();
            alert()->success('Success','Blog Post Added Successfully');
            return redirect()->route('blog.manage');
        }
        else{
            alert()->error('Error','something is happend please Try again');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blogpost::find($id);
        return view("backend.pages.blogpost.showblogpost",compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //blogpost edit for update
        $blog = Blogpost::find($id);
        $categories = Category::all();
        return view('backend.pages.blogpost.editblog',compact('blog','categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //blog post update


        $request->validate([
            'title'=>'required',
            'categoryId'=>'required',
            'drescreption'=>'required',
        ]);

        $blog = Blogpost::find($id);
        $blog->title = $request->title;
        $blog->category_id = $request->categoryId;
        $blog->user_id = auth()->user()->id;
        $blog->drescreption = $request->drescreption;
        $blog->status = $request->status;
        $blog->slug = Str::slug($request->title);

        if(!empty($request->image)){
            File::exists('backeend/blogimg/'. $blog->image);
            File::delete('backeend/blogimg/'. $blog->image);
            $image = $request->file('image');
            $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
            $location =public_path('backeend/blogimg/'.$imageCustomeName);
            Image::make( $image)->save($location);
            $blog->image= $imageCustomeName;
        }
        if($blog){
            $blog->update();
            alert()->success('Success','Blog Post update Successfully');
            return redirect()->route('blog.manage');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //blog post delete
        $blog = Blogpost::find($id);
        if($blog){
            if(File::exists('backeend/blogimg/'. $blog->image)){
                File::delete('backeend/blogimg/'. $blog->image);
            }
            $blog->delete();
            alert()->success('Success','Blog Post Delete Successfully');
            return redirect()->route('blog.manage');
        }
    }
}
