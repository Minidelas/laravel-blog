<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome view
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
      // $articles = DB::table('articles')
      //               ->join('users', 'users.id', '=', 'articles.user_id')
      //               ->join('comments', 'comments.article_id', '=', 'articles.id')
      //               ->select('articles.title', 'articles.content', 'users.name')
      //               // ->count('comments.id')
      //               // ->groupBy('articles.id')
      //               ->get();

      $articles = DB::select( DB::raw ('select
                    a.*,
                    count(distinct c.id) as comment_count,
                    u.`name`
                  from
                    articles a
                    left join comments c ON c.article_id = a.id
                    left join users u ON u.id = a.user_id
                  group by
                    a.id'));

      return view('welcome', ['articles' => $articles]);
    }
}
