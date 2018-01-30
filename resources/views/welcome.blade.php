@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container">
    <div class="subtitle m-b-md">
        Artículos
    </div>

      @foreach($articles as $article)
        <div class="single-article col-md-12">
          <div class="article-title">
            <a href="{{ action('ArticleController@show', $article->id) }}">
              {{ $article->title }}
            </a>
            <span class="pull-right">
              {{ $article->name }}
            </span>
          </div>
          <div class="article-content">
            {{ $article->content }}
            <span class="pull-right">{{ $article->comment_count }} comments</span>
          </div>
        </div>
      @endforeach
  </div>
</div>
@endsection
