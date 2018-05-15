@extends('app')
@section('content')
<h1>Articles</h1>
@foreach ($articles as $article)
    <article>
        <h2>{{$article->title}}</h2>
        <div class="body">{{$article->body}}</div>
        {{--<a href="/articles/{{ $article->id }}"> {{ $article->title }}</a>--}}
        {{--<a href="{{ action ('ArticlesController@show', [$article->id]) }}"> {{ $article->title }}</a>--}}
        <a href="{{ url('/articles', $article->id) }}"> {{ $article->title }}</a>

    </article>
@endforeach
