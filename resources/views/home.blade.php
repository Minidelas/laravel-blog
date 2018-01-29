@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif

    <div class="row">
       <a href="{{url('/create/article')}}" class="btn btn-success">Create Ticket</a>
       <a href="{{url('/articles')}}" class="btn btn-default">All Tickets</a>
    </div>
</div>
@endsection
