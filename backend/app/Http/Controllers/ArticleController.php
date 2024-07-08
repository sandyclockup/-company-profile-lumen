<?php

/**
 * This file is part of the Sandy Andryanto Company Profile Website.
 *
 * @author     Sandy Andryanto <sandy.andryanto.dev@gmail.com>
 * @copyright  2024
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\ArticleComment;

class ArticleController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['list', 'detail', 'listComment']]);
    }

    public function list(Request $request)
    {
        $page = $request->get("page", 1);
        $limit = 3 * $page;
        $newArticle = Article::where("status", 1)->with('references')->orderBy("id", "DESC")->first();
        $newArticles = Article::where("status", 1)->where("id", "!=", $newArticle->id)->take(3)->orderBy("id", "DESC")->get();
        $response = array(
            "continue"=> $limit <= Article::where("status", 1)->count(),
            "new_article"=> $newArticle,
            "new_articles"=> $newArticles,
            "page"=> $page,
            "stories"=> Article::where("status", 1)->with('user')->with('references')->limit($limit)->orderBy("id", "DESC")->get()
        );
        return response()->json($response);
    }

    public function detail($slug)
    {
        $article = Article::where("slug", $slug)->with('user')->with('references')->first();

        if(is_null($article)){
            $response = array("message"=> "The record with slug ".$slug." was not found in our record !!");
            return response()->json($response, 400);
        }

        $response = array("article"=> $article);
        return response()->json($response);
    }

    public function listComment($id)
    {
        $comments = ArticleComment::buildComment($id);
        $response = array("comments"=> $comments);
        return response()->json($response);
    }

    public function sendComment($id, Request $request)
    {
        $user = Auth::User();
        $comment = new ArticleComment();
        $comment->article_id = $id;
        $comment->user_id = $user->id;
        $comment->comment = $request->get('comment');
        $comment->save();
        return response()->json($comment);
    }



}
