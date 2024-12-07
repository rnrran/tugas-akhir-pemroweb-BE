<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        return Comment::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id,
        ]);
    }
}
