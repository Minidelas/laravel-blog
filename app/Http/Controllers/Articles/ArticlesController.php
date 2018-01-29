<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {

      $articles = \App\Article::where('user_id', Auth::id())->get();

      return view('articles.index', ['articles' => $articles]);
    }
}
