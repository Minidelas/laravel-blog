<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'article_id',
      'content'
    ];


    public function saveComment($data)
    {
        $this->article_id = $data['article_id'];
        $this->content = $data['content'];
        $this->save();
        return 1;
    }

    public function updateComment($data)
    {
        $comment = $this->find($data['id']);
        $comment->article_id = $data['article_id'];
        $comment->content = $data['content'];
        $comment->save();
        return -1;
    }
}
