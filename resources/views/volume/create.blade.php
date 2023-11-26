@extends('layouts.template')

@section('title', 'Add Waste')

@section('content')

<div class="row mb-5">
    <form action="{{ route('volume.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$user_id}}">
    </div>

    <div class="mt-3 mb-3">
        <label for="volume" class="form-label">Volume</label>
        <input type="number"
            class="form-control" name="volume" id="volume" aria-describedby="helpId" placeholder="dalam Kg">
        <small id="helpId" class="form-text text-muted">Masukkan jumlah sampah</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
