<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserModel::get();
        $unreadMessages = Message::where('read_at', false)->get();
        return view ('admin.users', compact ('users', 'unreadMessages' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = UserModel::get();
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.addUser', compact('unreadMessages', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $this->message();
        $data= $request->validate([
            'fullName'=>'required|string|max:50',
            'userName' => 'required|string|max:15', 
            'email'=>'required',  
            'password'=>'required|min:8', 
        ],$message);
        $data['active'] = isset($request-> active);
        $data['password'] = Hash::make($data['password']);
        UserModel::create ($data);
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = UserModel::findOrFail($id);
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.editUser', compact('users','unreadMessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->message();
        $data = $request->validate([
            'fullName' => 'required|string|max:50',
            'userName' => 'required|string|max:15',
            'email' => 'required',
            'password' => 'required|min:8',
        ], $message);
        $data['active'] = isset($request-> active);
        $data['password'] = Hash::make($data['password']);
        UserModel::where('id', $id)->update($data);
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function message(){
        return[
            'fullName.required'=>' This field is required ',
            'userName.required'=>'This field is required',
            'email.required'=>' Email is required',
            'password.min'=>' The minimum character is 8',
            'password.required'=>' Password is is required',
            
        ];
    }
}
