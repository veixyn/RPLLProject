@extends('layouts.template')

@section('title', $educational->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $educational->title }}</h1>
        @if ($educational->image)
            <img src="{{ $educational->image_url }}" class="rounded mx-auto d-block my-3" width="50%" height="auto">
        @endif
        <p>{{ $educational->body }}</p>
    </article>
@endsection
