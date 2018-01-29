<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'user_id',
      'title',
      'content'
    ];

    public function saveTicket($data)
    {
        $this->user_id = auth()->user()->id;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->save();
        return 1;
    }

    public function updateArticle($data)
    {
        $article = $this->find($data['id']);
        $article->user_id = auth()->user()->id;
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->save();
        return 1;
    }
}
