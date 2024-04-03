<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
     
        public function index()
        {
            // a revoir
            $data =Article::all();
            if ($data) {
                return response()->json($data, 200, );
            }else {
                return response()->json(['message'=>'articles_not_found'],400 );
            }
           
            
        }
      
        public function show($id)
        {
            $data =Article::find($id);
            if ($data) {
                return response()->json($data, 200, );
            }else {
                return response()->json(['message'=>'article_not_found'],400 );
            }
            
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
                'titre' => 'string',
                'contenu' => 'string',
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
            $article = Article::find($id);
            $data =Article::find($id);
            if ($article) {
                $article->delete();
                return response()->json(['message'=>'article_deleted'], 200, );
            }else {
                return response()->json(['message'=>'article_not_found'],400 );
            }
        }


        public function GetCommentsOfArticle(Request $request,$id)
        {
            $data =Article::with('comment')->find($id);
            if ($data) {
                return response()->json($data, 200, );
            }else {
                return response()->json(['message'=>'article_not_found'],400 );
            }
        }
    
}
