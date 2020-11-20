<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\DB;
/*use Illuminate\Http\Requests;
use Illuminate\Foundation\Http\GalleryRequest;*/


class GalleryController extends Controller
{
    
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(6);
        return view('backend.gallery.index', compact("galleries"));
    }

    public function create()
    {
         return view('backend.gallery.create');
    }

    public function store(GalleryRequest $request)
    {   
        $galleries = new Gallery();

        $galleries->title=$request->input('title');
        $galleries->price=$request->input('price');
        $galleries->detail=$request->input('detail');
        $galleries->sold_out=$request->input('sold_out');

        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $extension = $file-> getClientOriginalExtension();
            $filename = time() . ".".$extension;
            $file->move(public_path('images'), $filename);
            $galleries->image =$filename;
        } else {
            return $request;
            $galleries->image ="";
        }

        $galleries->save();
        return redirect()->route('gallery.index')
            ->with('success', 'Gallery added successfully');
    }
    
    public function show(GalleryRequest $gallery)
    {
        //
    }

    public function edit($id)
    {
        $galleries = Gallery::findorFail($id);
        return view('backend.gallery.edit')->with('galleries', $galleries);
    }

    public function update(GalleryRequest $request,$id)
    {
        
        $galleries =Gallery::find($id);

        $galleries->title=$request->input('title');
        $galleries->price=$request->input('price');
        $galleries->detail=$request->input('detail');
        $galleries->sold_out=$request->input('sold_out');

        if ($request->hasfile('image')) {
            $file = $request->file("image");
            $extension = $file-> getClientOriginalExtension();
            $filename = time() . ".".$extension;
            $file->move(public_path('images'), $filename);
            $galleries->image =$filename;
        } 
        $galleries->save();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery updated successfully');
    
    }

    
    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);
        $image_path = public_path('images').'/'.$galleries->image;
        unlink($image_path);
   
        $galleries->delete();

        return redirect()->route("gallery.index")->with('error', 'Data deleted for gallery');
    }


    public function sold_out($id){
        $data = array();
        $data['sold_out'] = 0;

        DB::table('galleries')->where('id',$id)->update($data);

        return redirect()->route("gallery.index")->with('status', 'Data Updated for Gallery');
    }

   public function gallery_search(Request $request)
    {
        $searchData = $request->searchData;
        $galleries = DB::table('galleries')
            ->where('title', 'like', '%' . $searchData . '%')
            ->paginate(6);
        return view('backend.gallery.search',compact('galleries'));
    }
}
