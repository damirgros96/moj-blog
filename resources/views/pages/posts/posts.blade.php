@extends('layouts.app')

@section('content')

@php

use Illuminate\Support\Str;

@endphp

    <div class="row mb-5">
    @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
            <a href="{{ route('posts-detail', $post->id) }}">
                <img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        <strong>Category:</strong> {{ $post->category->name }}<br>
                        <strong>Author:</strong> {{ $post->user->name }}
                    </p>
                    <p class="card-text">{!! Str::limit($post->content, 100) !!}</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection