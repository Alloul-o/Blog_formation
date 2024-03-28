<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        return $comments = Comment::all();
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contenu' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $comment = Comment::create([
            'contenu' => $request->contenu,
            'article_id' => $request->article_id,
        ]);

        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment], 201);
    
    }
    public function show($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }
        return response()->json($comment);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'contenu' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $comment->contenu = $request->contenu;
        $comment->article_id = $request->article_id;
        $comment->save();

        return response()->json(['message' => 'Comment updated successfully', 'comment' => $comment]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }

}
