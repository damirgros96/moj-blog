@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-fluid">
        <p>Content: {!! $post->content !!}</p>
        <p>Category: {{ $post->category->name }}</p>
    </div>
@endsection
