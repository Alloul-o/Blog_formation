<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
     /**
     * @OA\Info(
     *     title="Article API",
     *     version="1.0.0"
     * )
     */
    /**@OA\Get(
            *     path="/articles",
            *     summary="Get a list of article",
            *     tags={"Articles"},
            *     @OA\Response(response=200, description="Successful operation"),
            *     @OA\Response(response=400, description="Invalid request")
            * ) */
        public function index()
        {
            return Article::all();
        }
      /**@OA\Get(
            *     path="/articles/{article}",
            *     summary="Get one article",
            *     tags={"Articles"},
            *     @OA\Response(response=200, description="Successful operation"),
            *     @OA\Response(response=400, description="Invalid request")
            * )
            */
        public function show($id)
        {
            return Article::find($id);
        }

    /** @OA\Post(
            *     path="/articles",
            *     summary="add article",
            *     tags={"Articles"},
            *     @OA\Response(response=200, description="Successful operation"),
            *     @OA\Response(response=400, description="Invalid request")
            * 
            *)
     */
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'titre' => 'required',
                'contenu' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
    
            $comment = Comment::create([
                'titre' => $request->titre,
                'contenu' => $request->contenu,
            ]);
            return  response()->json($comment, 200, );
        }
        /**   @OA\Put(
            *     path="/articles/{article}",
            *     summary="update article",
            *     tags={"Articles"},
            *     @OA\Response(response=200, description="Successful operation"),
            *     @OA\Response(response=400, description="Invalid request")
            * ) */
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
   /** @OA\delete(
            *     path="/articles/{article}",
            *     summary="delete article",
            *     tags={"Articles"},
            *     @OA\Response(response=200, description="Successful operation"),
            *     @OA\Response(response=400, description="Invalid request")
            * ) */
        public function delete(Request $request, $id)
        {
            $article = Article::findOrFail($id);
            $article->delete();
    
            return 204;
        }


        public function GetCommentsOfArticle(Request $request,$id)
        {
            
            return Article::with('comment')->find($id);
        }
    
    
}
