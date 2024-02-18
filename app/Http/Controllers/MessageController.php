<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $unreadMessages = Message::where('read_at', false)->get();
        return view ('admin.messages', compact ('messages', 'unreadMessages'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadMessages = Message::where('read_at', false)->get();
        return view('contactUs', compact('unreadMessages'));
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
        $unreadMessageCount = Message::where('read_at', false)->count();
        Session::put('unreadMessageCount', $unreadMessageCount);
        Mail::to('yoya@email.com')->send(
            new email($data));
        return redirect('contact')->with('success', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $messages = Message::findOrFail($id);
        $messages->update(['read_at' => true]);
        
        $unreadMessages = Message::where('read_at', false)->get();
        $unreadMessageCount = Message::where('read_at', false)->count();
        session()->flash('message', 'Message marked as read.');
        session()->flash('unreadMessageCount', $unreadMessageCount);
        return view('admin/showMessage', compact('messages', 'unreadMessages'));
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
