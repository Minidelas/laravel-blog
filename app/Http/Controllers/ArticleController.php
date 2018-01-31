<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('user_id', auth()->user()->id)->get();

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $data = $this->validate($request, [
          'title' => 'required',
          'content' => 'required'
        ]);

        $article->saveArticle($data);

        return redirect('/home')->with('success', 'Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $user = User::find($article->user_id);
        $comments = Comment::where('article_id', $article->id)->get();

        return view('article.show', compact('article', 'comments', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('user_id', auth()->user()->id)
                          ->where('id', $id)
                          ->first();
        if (count($article) > 0) {
          return view('article.edit', compact('article', 'id'));
        } else {
          return redirect('/home')->with('reject', 'Not allowed.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = new Article();
        $data = $this->validate($request, [
          'content' => 'required',
          'title' => 'required'
        ]);
        $data['id'] = $id;
        $article->updateArticle($data);

        return redirect('/home')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id<
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/home')->with('success', 'Article deleted');
    }

    /**
     * Upvote the specified resource.
     *
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, Article $article)
    {
        if ($article->upvoteArticle($article)) {
          return response()->json(null, 200);
        }
        return response()->json(null, 404);
    }

    /**
     * Downvote the specified resource.
     *
     * @param  int  $article
     * @return \Illuminate\Http\Response
     */
    public function downvote(Request $request, Article $article)
    {
        if ($article->downvoteArticle($article)) {
          return response()->json(null, 200);
        }
        return response()->json(null, 404);
    }
}
