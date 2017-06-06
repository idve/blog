<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    public function index()
    {


        return view('home.photo_index');
    }
}
