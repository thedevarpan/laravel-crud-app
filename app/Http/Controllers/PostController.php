<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $postData = Post::get();
        return view('index', compact('postData'));
    }

    // Create Post

    public function create()
    {
        $category = Category::get();
        return view('create', compact('category'));
    }

    //Submit data

    public function submit(Request $request)
    {
        // dd($request->all());
        // return view();
        $request->validate([
            'image' => ['required', 'image', 'max:2048'],
            'name' => ['required', 'string'],
            'category' => ['required'],
            'age' => ['required'],
            'address' => ['required'],
            'description' => ['required']
        ]);

        $post = new Post();
        // Ata Posts Table ar Model 
        $post->cata_id = $request->category;
        // Table Ar fil    Form ar input fild
        $post->name = $request->name;
        $post->age = $request->age;
        $post->address = $request->address;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);

            // Save image path to database
            $post->image =   $name; // adjust path based on your setup
            $post->save();
        }

        return redirect()->back();
    }
}
