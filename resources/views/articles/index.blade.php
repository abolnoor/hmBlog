@extends('layouts.master')
@section('title', 'Articles')
@section('content')

    @if($tag)
        <h1> {{ $tag->name }} </h1>
    @endif

    @forelse($articles as $article)

        <a href="{{ $article->path() }}"><h2> {{ $article->title }} </h2></a>
        <p> {!! $article->excerpt !!} </p>

    @empty
        <p>No Articles !</p>

    @endforelse

@endsection
