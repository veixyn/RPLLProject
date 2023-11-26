@extends('layouts.template')

@section('title', 'Articles List')

@section('content')
    {{-- <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">Add New Articles</a>
    </div> --}}

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
                    <th scope="col">Hari</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Status</th>
                    {{-- <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                        @foreach ($day as $days)
                        <tr>
                        <td>#</td>
                        <td>
                                {{ $days }}
                        </td>
                        <td>test</td>
                        <td><a name="" id="" class="btn btn-success" href="#" role="button">Sudah diangkut</a></td>
                        </tr>
                        @endforeach

                        {{-- <td>{{ Str::limit($article->body, 50, ' ...') }}</td> --}}
                        {{-- <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td>{{ $article->category?->name ?? 'No Category' }}</td>
                        <td>
                            <a href="{{ route('articles.edit', $article)}}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td> --}}
                    {{-- </tr> --}}

                    {{-- <tr>
                        <td colspan="5">No articles found.</td>
                    </tr> --}}
            </tbody>
        </table>

        {{-- <div class="d-flex justify-content-center">
            {!! $articles->links() !!}
        </div> --}}
    </div>
@endsection
