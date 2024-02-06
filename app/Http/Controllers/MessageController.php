<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\email;
use Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();
        return view ('admin.messages', compact ('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactUs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $this->message();
        $data= $request->validate([
            'fname'=>'required|string',
            'lname' => 'required|string',
            'email'=>'required|string', 
            'message' => 'required|string',
        ],$message);
        Message::create ($data);
        Mail::to('yoya@email.com')->send(
            new email($data));
        return redirect('admin/messages');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $messages = Message::findOrFail($id);
        $messages->update(['read_at'=>1]);
        return view('admin/showMessage', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::where('id', $id)->forceDelete();
        return redirect('admin/messages');
    }
    public function message(){
        return[
            'fname.required'=>' This field is reqired',
            'lname.required'=>' This field is reqired',
            'email.required'=>'The email is required',
            'message.required'=> 'This field is reqired',
        ];}
}
