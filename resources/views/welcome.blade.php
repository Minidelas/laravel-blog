@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container">
    <div class="subtitle m-b-md">
      Articles
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
        </div>
        <div class="btn-group btn-group-xs pull-right" role="group">
          <a href="{{ action('ArticleController@show', $article->id) }}" class="btn btn-default comments">{{ $article->comment_count }} <i class="fa fa-comments-o" aria-hidden="true"></i></a>
          <button data-article-id="{{ $article->id }}" class="btn btn-primary likes">{{ $article->likes }} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
          <button data-article-id="{{ $article->id }}" class="btn btn-danger dislikes">{{ $article->dislikes }} <i class="fa fa-thumbs-o-down" aria-hidden="true"></i></button>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

@section('javascripts')
  <script src="{{ asset('js/pages/welcome.js') }}" charset="utf-8"></script>
@stop
