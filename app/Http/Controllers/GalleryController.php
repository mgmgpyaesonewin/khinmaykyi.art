<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
/*use Illuminate\Http\Requests;
use Illuminate\Foundation\Http\GalleryRequest;*/


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(6);
        return view('backend.gallery.index', compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            ->with('success', 'Category added successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryRequest $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::findorFail($id);
        return view('backend.gallery.edit')->with('galleries', $galleries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
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
            ->with('success', 'Category added successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);
        $image_path = public_path('images').'/'.$galleries->image;
        unlink($image_path);
   
        $galleries->delete();

        return redirect()->route("gallery.index")->with('status', 'Data deleted for gallery');
    }


    public function sold_out($id){
        $data = array();
        $data['sold_out'] = 0;

        DB::table('galleries')->where('id',$id)->update($data);

        return redirect()->route("gallery.index")->with('status', 'Data Updated for Gallery');
    }


}
