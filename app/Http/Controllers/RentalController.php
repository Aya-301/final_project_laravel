<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Car;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CarController;

class RentalController extends Controller
{
    //home
    public function home ()
    {
        $testimonials = Testimonial::where('published', 1)->get();
        $cars = Car::where('active', 1)->get();
        return view ('index', compact ('testimonials', 'cars'));
    }
    //car list
    public function list ()
    {
        $cars = Car::get();
        $testimonials = Testimonial::get();
        return view('carList', compact('cars', 'testimonials'));
    }
    //testimonials
    public function testimonials ()
    {
        $testimonials = Testimonial::get();
        return view ('testimonials', compact ('testimonials'));
    }
    //blog
    public function blog ()
    {
        return view('blog');
    }
    //single
    public function single ()
    {
        return view('single');
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
