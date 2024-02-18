<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Message;
use App\Traits\Common;

class CarController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars= Car::get();
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.cars', compact('cars', 'unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::get();
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.addCar', compact('categories','unreadMessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $this->message();
        $data= $request->validate([
            'title'=>'required|string|max:50',
            'content' => 'required|string|max:100', 
            'luggage'=>'required', 
            'doors'=>'required', 
            'passengers'=>'required', 
            'price'=>'required', 
            'image' => 'required|mimes:png,jpg,jpeg|max:3048',
            'category_id'=>'required', 
        ],$message);
        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;
        $data['active'] = isset($request-> active);
        Car::create ($data);
        return redirect('admin/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cars = Car::findOrFail($id);
        return view('single', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        $unreadMessages = Message::where('read_at', false)->get();
        $cars= Car::findOrFail($id);
        return view('admin.editCar', compact('cars', 'categories', 'unreadMessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->message();
        $data= $request->validate([
            'title'=>'required|string|max:50',
            'content' => 'required|string|max:100', 
            'luggage'=>'required', 
            'doors'=>'required', 
            'passengers'=>'required', 
            'price'=>'required', 
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:3048',
            'category_id'=>'required', 
        ],$message);
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/img');    
            $data['image'] = $fileName;
            unlink('assets/img/'. $request->oldImage);
        }
        $data['active'] = isset($request-> active);
        Car::where('id', $id)->update ($data);
        return redirect('admin/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect('admin/cars');
    }
    public function message(){
        return[
            'title.required'=>' This field is required ',
            'luggage.required'=>'This field is required',
            'content.required'=>' This field is required',
            'content.max'=>' You reached maximum numbers of letters',
            'doors.required'=>' This field is required',
            'passengers.required'=>' This field is required',
            'price.required'=>' This field is required',
            'image.required'=>' You Should choose a file',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            'category_id.required'=>' You Should choose a file',
            
        ];
    }
}
