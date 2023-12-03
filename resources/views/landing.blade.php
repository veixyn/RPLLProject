@extends('layouts.template')

@section('title', 'Landing Page')

@section('nav')
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="{{ route('educational-list') }}"> All</a>
            {{-- Tampilkan semua Category --}}
            @php($categoryMenus = App\Models\EducationalCategory::all())

            @foreach ($categoryMenus as $categoryMenu)
                <a class="p-2 link-secondary" href="{{ route('educational-list', ['educationalCategory' => $categoryMenu->slug]) }}">
                    {{ $categoryMenu->name }}
                </a>
            @endforeach
        </nav>
    </div>
@endsection

@section('content')
    @if (isset($educationals))
    <div class="row mb-2">
        @forelse ($educationals as $educational)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">
                            {{ $educational->educationalCategory?->name ?? 'Uncategorized' }}
                        </strong>
                        <h3 class="mb-0">{{ $educational->title }}</h3>
                        <div class="mb-1 text-muted">{{ $educational->updated_at }}</div>
                        <p class="card-text mb-auto">{{ Str::limit($educational->body, 50, ' ...') }}</p>
                        <a href="{{ route('educational.show', $educational) }}" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        @if ($educational->image)
                            <img src="{{ $educational->image_url }}" alt="image" width="200" height="250">
                        @else
                            <img src="https://via.placeholder.com/200x250" width="200" height="250">
                        @endif
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No educationals found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $educationals->links() }}
    </div>
    @endif
@endsection
