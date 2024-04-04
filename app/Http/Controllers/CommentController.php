<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }
    public function index()
    {
        $data = Comment::all();
        if ($data) {
            return response()->json($data, 200, );
        }else {
            return response()->json(['message'=>'comment_not_found'],400 );
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $comment = Comment::create([
            'body' => $request->body,
            'article_id' => $request->article_id,
        ]);

        return response()->json(['message' => 'Comment_created_successfully', 'comment' => $comment], 201);
    
    }
    public function show($id)
    {
        $data = Comment::find($id);
        if ($data) {
            return response()->json($data, 200, );
        }else {
            return response()->json(['message'=>'comment_not_found'],400 );
        }
       
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment_not_found'], 404);
        }

        $comment->body = $request->body;
        $comment->save();

        return response()->json(['message' => 'Comment updated successfully', 'comment' => $comment]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment_not_found'], 404);
        }else {
            $comment->delete();
        }

        

        return response()->json(['message' => 'Comment_deleted_successfully','data'=> $comment]);
    }

}
