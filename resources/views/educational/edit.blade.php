@extends('layouts.template')

@section('title', 'Add New Educational')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Edit Educational</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('educational.update', $educational) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $educational->title) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @if ($educational->image)
                        <img src="{{ $educational->image_url }}" class="mt-3" style="max-width: 400px;">
                    @endif
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" rows="10" name="body">{{ old('body', $educational->body) }}</textarea>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <select class="form-select form-select-lg mb-3" name="educational_category_id">
                        <option>No Category</option>
                        @foreach ($educationalCategories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $educational->educational_category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
