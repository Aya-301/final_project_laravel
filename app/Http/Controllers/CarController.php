<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    //home
    public function home ()
    {
        return view('index');
    }
    //car list
    public function list ()
    {
        return view('carList');
    }
    //testimonials
    public function testimonials ()
    {
        return view('testimonials');
    }
    //blog
    public function blog ()
    {
        return view('blog');
    }
    //about
    public function about ()
    {
        return view('about');
    }
    //contact
    public function contact ()
    {
        return view('contactUs');
    }


}
