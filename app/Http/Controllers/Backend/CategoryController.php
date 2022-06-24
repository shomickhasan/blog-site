<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Backend\Category;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.categoryadd');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.pages.managecategory',compact('categories'));
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
            'categoryName'=>'required|unique:categories,name',
            'categoryDrescreption'=>'required',
        ]);
        $category = new Category();
        $category->name = $request->categoryName;
        $category->drescreption = $request->categoryDrescreption;
        $category->status = $request->status;
        $category->slug =  Str::slug($request->categoryName);
        if($category){
            $category->save();
            alert()->success('Success','Category Added Successfully');
            return redirect()->route('category.manage');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('backend.pages.editcategory',compact('categories'));
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
        //validate
        $category = Category::find($id);
        $request->validate([
            'categoryName'=>"required",
            //|unique:categories,name,$category->name",
            'categoryDrescreption'=>'required',
        ]);
          
        $category->name = $request->categoryName;
        $category->drescreption = $request->categoryDrescreption;
        $category->status = $request->status;
        $category->slug =  Str::slug($request->categoryName);
        if($category){
            $category->update();
           alert()->success('Success','Category Update Successfully');
          return redirect()->route('category.manage');
        }
        else{
         alert()->error('Error','something is happend please Try again');
           return back(); 
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
        $category = Category::find($id);
        if($category){
            $category->delete();
            alert()->success('Success','Category Delete Successfully');
            return redirect()->route('category.manage');
        }
    }
}
