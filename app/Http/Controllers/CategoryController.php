<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Message;
use App\Models\Car;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =Category::get();
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.categories', compact('categories', 'unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.addCategory' ,compact('unreadMessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'cat_name'=>'required|string|max:50',
        ]);
        Category::create ($data);
        return redirect('admin/categories');
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
        $categories= Category::findOrFail($id);
        $unreadMessages = Message::where('read_at', false)->get();
        return view('admin.editCategory', compact('categories', 'unreadMessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->validate([
            'cat_name'=>'required|string|max:50',
        ]);
        Category::where('id', $id)->update ($data);
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Check if the category has associated cars
        $categories = Category::findOrFail($id);
        $carsCount = Car::where('category_id', $categories->id)->count();

        if ($carsCount > 0) {
            return redirect('admin/categories')->with('error', 'Cannot delete category as it contains cars.');
        }

        // If no cars associated, delete the category
        $categories->forceDelete();
        return redirect('admin/categories')->with('success', 'Category deleted successfully.');
    }
    
}
