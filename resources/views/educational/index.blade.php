@extends('layouts.template')

@section('title', 'Educational List')

@section('content')

    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Data untuk Laman Educational</h1>
        <a href="{{ route('educational.create') }}" class="btn btn-primary btn-sm">Add New Educational</a>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($educationals as $educational)
                    <tr>
                        <th scope="row">{{ $educational->id }}</th>
                        <td>
                            <a href="{{ route('educational.show', $educational) }}">
                                {{ $educational->title }}
                            </a>
                        </td>
                        <td>{{ Str::limit($educational->body, 50, ' ...') }}</td>
                        <td>{{ $educational->educationalCategory?->name ?? 'No Category' }}</td>
                        <td>{{ $educational->created_at }}</td>
                        <td>{{ $educational->updated_at }}</td>
                        <td>
                            <a href="{{ route('educational.edit', $educational) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('educational.destroy', $educational) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No educationals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $educationals->links() !!}
        </div>
    </div>
@endsection
