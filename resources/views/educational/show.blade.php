@extends('layouts.template')

@section('title', $educational->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $educational->title }}</h1>
        <p class="blog-post-meta">{{ $educational->updated_at }}</p>
        @if ($educational->image)
            <img src="{{ $educational->image_url }}" class="rounded mx-auto d-block my-3">
        @endif
        <p>{{ $educational->body }}</p>
    </article>
@endsection
