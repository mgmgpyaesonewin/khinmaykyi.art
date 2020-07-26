<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

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
    public function store(Request $request)
    {
          $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',   
            'title' => 'required'
            
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'image' => $new_name,    
            'title' => $request->title
            
        );
        Gallery::create($form_data);
        return redirect()->route("gallery.index")->with('success', 'Data Added successfuly');
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
         $galleries = Gallery::findorFail($id);
        return view('backend.gallery.edit')->with('galleries', $galleries);
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
        
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '') {
            $request->validate([
                'image' => 'image|max:2048',
                'title' => 'required'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([
                'title' => 'required',
            ]);
        }
        $form_data = array(
            'image' => $image_name,
            'title' => $request->title
            
        );
        Gallery::whereId($id)->update($form_data);
        return redirect()->route("gallery.index")->with('status', 'Data Updated for Gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleries = Gallery::findOrFail($id);
        $galleries->delete();
        return redirect()->route("gallery.index")->with('status', 'Data deleted for gallery');
    }
}
