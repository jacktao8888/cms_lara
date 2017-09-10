@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <hr>

    <h3>{{ $article->author }}</h3>
    <article>
        {{ $article->content }}
    </article>

@endsection