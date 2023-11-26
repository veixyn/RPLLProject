@extends('layouts.template')

@section('title', 'Data Sampah')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Data Volume Sampah</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="my-4">
        <div class="card mb-3">
            <div class="card-body">
                @foreach ($volume as $volumes)
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Volume</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $volumes?->volume ?? '-' }} kg</div>
                    <div class="col-sm-9 text-secondary">{{ $volumes?->created_at ?? '-' }}</div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
