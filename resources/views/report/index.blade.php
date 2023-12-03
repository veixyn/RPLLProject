@extends('layouts.template')

@section('title', 'title')

@section('content')

<form method="post" action="{{ route('report.show') }}">
    @csrf
    <label for="month">Select Month:</label>
    <select name="month" id="month">
        @foreach ($months as $month)
            <option value="{{ $month->month }}">{{ $month->month }}</option>
        @endforeach
    </select>
    <input type="submit" value="Show Data">
</form>

@if (isset($data))
    <!-- Display table based on selected month -->
    <h2>Data untuk Bulan: {{ $selectedMonth }}</h2>
    <div class="table-responsive">
        <table class="table table-light" id="tabelReport">
            <thead class="table table-primary">
                <tr>
                    <th scope="col">RW</th>
                    <th scope="col">RT</th>
                    <th scope="col">No. KK</th>
                    <th scope="col">Nama. KK</th>
                    <th scope="col">Sampah Basah (kg)</th>
                    <th scope="col">Sampah Kering (kg)</th>
                    <th scope="col">Total Sampah (kg)</th>
                </tr>
            </thead>
            @forelse ($data as $item)
            <tr class="">
                <td scope="row">{{ $item->rw }}</td>
                <td>{{ $item->rt }}</td>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->Basah }}</td>
                <td>{{ $item->Kering }}</td>
                <td>{{ $item->Total }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">No data found for the selected month.</td>
                </tr>
            @endforelse
        </table>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script>
                let table = new DataTable('#tabelReport');
            </script>
    </div>
@endif

@endsection
