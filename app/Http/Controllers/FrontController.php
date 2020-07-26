<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
class FrontController extends Controller
{
    
    public function gallery()
    {
         $galleries = Gallery::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.gallery', compact("galleries"));
    }
    
}
