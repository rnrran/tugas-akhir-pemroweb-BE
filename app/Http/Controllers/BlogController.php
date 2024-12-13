<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
public function index()
{
    return Blog::with('user', 'category')->get();
}

    public function show($id)
    {
        return Blog::with('user', 'comments.user', 'category')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'description' => 'required|string|max:500',  
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        return Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'description' => $request->description, 
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return response()->json($blog); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', 
            'description' => 'required|string|max:500',  
        ]);

        // ambil berdasarkan id
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id, 
            'description' => $request->description, 
        ]);

        return response()->json($blog); 
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete(); 

        return response()->json(['message' => 'Blog deleted successfully.']);
    }
}
