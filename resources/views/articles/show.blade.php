@extends('layouts.master')
@section('title', $article->slug)
@section('content')

    <h2> {{ $article->title }} </h2>
    <em>by: {{ $article->author ? $article->author->name : 'anonymous' }}</em>

   <p>
       @foreach($article->tags as $tag)
           <a style="margin: 8px; background-color: lightblue; border-radius: 25%" href="{{ route('tag.articles', $tag) }}"><span> {{ $tag->name }} </span></a>
       @endforeach
   </p>
    <div class="container-fluid" style="height:200px;background-image: url(/{{ $article->image }});background-color: grey"></div>

    <p> {{ $article->content }} </p>

@endsection
