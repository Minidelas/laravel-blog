@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Title</td>
              <td>Content</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{$article->title}}</td>
                <td>{{$article->content}}</td>
                <td><a href="{{ action('ArticleController@edit', $article->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                  <form action="{{ action('ArticleController@destroy', $article->id) }}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection
