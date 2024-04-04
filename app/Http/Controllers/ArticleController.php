<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
     
        public function __construct()
        {
            $this->middleware('role:admin');
        }
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
                'title' => 'required',
                'content' => 'required',
                'publication_date'=>'required',
                'name_category'=>'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $article = Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'publication_date'=>$request->publication_date
            ]);

            $category=Category::create([
                'name_category' => $request->name_category,
                'article_id' => $article->id
            ]);
            
            $article->category()->associate($category)->save();

            // Load the category  with the article
            $article->load('category');
            return  response()->json($article, 200, );
        }
        
        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'title' => 'string',
                'content' => 'string',
                'publication_date'=>'string',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $article = Article::find($id);
            if ($article) {
                $article->update($request->all());
                return response()->json($article, 200, );
            }else {
                return response()->json(['message'=>'article_not_found'],400 );
            }
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
            $data =Article::with('comment','tag','category')->find($id);
            if ($data) {
                return response()->json($data, 200, );
            }else {
                return response()->json(['message'=>'article_not_found'],400 );
            }
        }
    
}
