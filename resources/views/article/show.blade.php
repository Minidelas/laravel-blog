@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="buttons-bar">
      <a class="btn btn-default" href="{{ route('welcome') }}">Back</a>
    </div>
    <div class="subtitle m-b-md">
      {{ $article->title }}
      <span class="pull-right username">By: {{ $user->name }}</span>
    </div>
    <div class="article-content-show">
      {{ $article->content }}
    </div>
    @if(count($comments) > 0)
      <div class="row">
        <div class="col-md-12">
          <p>Comments</p>
        </div>
        <div class="col-md-12">
          @foreach($comments as $comment)
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="..." alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Publish user</h4>
                {{ $comment->content }}
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif
    <div class="row">
      <form action="{{ action('CommentController@store') }}" method="post">
        <div class="form-group">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="article_id" value="{{ $article->id }}">
        </div>
        <div class="form-group">
          <label for="content">Comment</label>
          <textarea name="content" class="form-control" rows="5" cols="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
@endsection
