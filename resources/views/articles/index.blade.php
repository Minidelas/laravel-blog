@extends('layouts.app')

@section('content')
<div class="container">
    <div class="subtitle text-left m-b-md">
        Published Content
    </div>

    <div class="row articles">
        @foreach ($articles as $article)
            <div class="col-md-6 single-article">
                <div class="article-title">{{ $article->title }}</div>
                <div class="article-content">{{ $article->content }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
