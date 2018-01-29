@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Laravel
    </div>

    <div class="links">
        @foreach ($links as $link)
            <a href="{{ $link->url }}">{{ $link->title }}</a>
        @endforeach
    </div>
</div>
@endsection
