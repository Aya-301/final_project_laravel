<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Message;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        $unreadMessages = Message::where('read_at', false)->get();
        return view ('admin.testimonials', compact ('testimonials', 'unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.addTestimonial', compact('unreadMessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $this->message();
        $data= $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string', 
            'content' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:3048',
        ],$message);
        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;
        $data['published'] = isset($request-> published);
        Testimonial::create ($data);
        return redirect('admin/admintestimonials');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.showTestimonial', compact('testimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.editTestimonial', compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->message();
        $data= $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string',
            'content' => 'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:3048'
            
        ],$message);

        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/img');    
            $data['image'] = $fileName;
            unlink('assets/img/'. $request->oldImage);
        }
        $data['published'] = isset($request-> published);
        Testimonial::where('id', $id)->update ($data);
        return redirect('admin/admintestimonials');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->forceDelete();
        return redirect('admin/admintestimonials');
    }

    public function message(){
        return[
            'name.required'=>' This field is required ',
            'position.required'=>'This field is required',
            'content.required'=>' This field is required',
            'image.required'=>' You Should choose a file',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            
        ];
    }
}
