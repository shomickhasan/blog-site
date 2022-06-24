<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Tag;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tag add page view
        return view('backend.pages.tags.tagadd');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //manage tag
        $tags = Tag::orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.pages.tags.managetag',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tag store
        $request->validate([
            'name'=>'required|unique:tags,name',
            'drescreption'=>'required',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->drescreption = $request->drescreption;
        $tag->status = $request->status;
        $tag->slug =  Str::slug($request->name);
        if($tag){
            $tag->save();
            alert()->success('Success','Tag Added Successfully');
            return redirect()->route('tag.manage');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //tag show for update
        $tag = Tag::find($id);
        return view('backend.pages.tags.edittag',compact('tag'));
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
        
        $request->validate([
             'name'=>'required',
             //|unique:tags,name',
             'drescreption'=>'required',
         ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->drescreption = $request->drescreption;
        $tag->status = $request->status;
        $tag->slug =  Str::slug($request->name);
        $tag->update();
        if($tag){
            alert()->success('Success','Tag Update Successfully');
            return redirect()->route('tag.manage');
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
        $tag = Tag::find($id);
        if($tag){
            $tag->delete();
            alert()->success('Success','Tag Delete Successfully');
            return redirect()->route('tag.manage');
        }
    }
}
