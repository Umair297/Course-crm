<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $customer_id = $request->id;
        $comments = Comment::where('customer_id', $customer_id)->get();
        return view('customer.comment', compact('comments', 'customer_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',  
            'comment' => 'required',  
        ]);
        $customer_id = auth()->id();
        Comment::create([
            'customer_id' => $request->customer_id,
            'sender_id' => auth()->user()->id,
            'comment' => $request->comment,
            
        ]);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }
    
    public function delete($id)
{ 
    $comment = Comment::findOrFail($id); 
    if (auth()->id() !== $comment->customer_id) {
        return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
    } 
    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully.');
}
}
