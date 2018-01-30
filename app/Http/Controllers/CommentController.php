<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $comment = new Comment();
      $data = $this->validate($request, [
        'article_id' => 'required',
        'content' => 'required'
      ]);

      $comment->saveComment($data);

      return redirect('/article/'.$data['article_id']);
  }
}
