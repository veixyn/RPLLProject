@extends('layouts.template')

@section('title', 'Buang Sampah')

@section('content')

<div class="row mb-5">
    <form action="{{ route('volume.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$user_id}}">
    </div>

    <div class="mb-3 col-md-12 col-sm-12">
        <label for="type" class="form-label">Tipe Sampah</label>
        <select class="form-control" id="type" name="type" required>
            <option disabled selected="selected">Select Option Here</option>
            <option value="Basah" {{ old('type') === 'Basah' ? 'selected' : ''}}>Basah</option>
            <option value="Kering" {{ old('type') === 'Kering' ? 'selected' : ''}}>Kering</option>
        </select>
    </div>

    <div class="mb-3 col-md-12 col-sm-12">
        <label for="type_description" class="form-label">Kategori Sampah</label>
        <select id="type_description" name="type_description" class="form-control" required>
        </select>
    </div>

    <div class="mt-3 mb-3">
        <label for="volume" class="form-label">Volume</label>
        <input type="number"
            class="form-control" name="volume" id="volume" aria-describedby="helpId" placeholder="dalam Kg" step=".01">
        <small id="helpId" class="form-text text-muted">Masukkan jumlah sampah (dalam Kg)</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
