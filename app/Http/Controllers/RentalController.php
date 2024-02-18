<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Car;
use App\Models\Category;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;

class RentalController extends Controller
{
    //home
    public function home ()
    {
        $testimonials = Testimonial::latest()->take(3)->where('published', 1)->get();
        $cars = Car::latest()->take(6)->where('active', 1)->get();
        return view ('index', compact ('testimonials', 'cars'));
    }
    //car list
    public function list ()
    {
        $cars = Car::paginate(6);
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
    public function single (string $id)
    {
        $categories = Category::with('cars')->get();
        $cars = Car::findOrFail($id);
        return view('single', compact('cars', 'categories'));
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
