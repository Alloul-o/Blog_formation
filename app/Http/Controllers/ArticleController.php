<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
     
        public function index()
        {
            return Article::all();
        }
      
        public function show($id)
        {
            return Article::find($id);
        }

    
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'contenu' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
    
            $comment = Article::create([
                'titre' => $request->titre,
                'contenu' => $request->contenu,
            ]);
            return  response()->json($comment, 200, );
        }
        
        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'contenu' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $article = Article::findOrFail($id);
            $article->update($request->all());
    
            return $article;
        }
   
        public function delete(Request $request, $id)
        {
            $article = Article::findOrFail($id);
            $article->delete();
    
            return [$article,"article deleted"];
        }


        public function GetCommentsOfArticle(Request $request,$id)
        {
            
            return Article::with('comment')->find($id);
        }
    
    
}
