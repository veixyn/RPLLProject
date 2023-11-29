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

        <div class="row mt-4 mb-4 align-items-center">
            <x-dashboard-div title="Total Input Sampah" body="{{$totalInput}} Total Data">
            </x-dashboard-div>
            <x-dashboard-div title="Total Sampah Kering" body="{{ $totalKering }}kg">
            </x-dashboard-div>
            <x-dashboard-div title="Total Sampah Basah" body="{{$totalBasah}}kg">
            </x-dashboard-div>
            <x-dashboard-div title="Total Seluruh Sampah" body="{{$totalSampah}}kg">
            </x-dashboard-div>
        </div>

        <div class="dropdown open">
            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        Dropdown Colored
                    </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Tampilkan data per Hari</a>
                <a class="dropdown-item" href="#">Tampilkan data per Bulan</a>
                <a class="dropdown-item" href="#">Tampilkan data per Tahun</a>
            </div>
        </div>

        <div class="my-4">
            <div class="card mb-3">
                <div class="card-body">
                    @foreach ($volume as $volumes)
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Volume</h6>
                        </div>
                        <div class="col-sm-9 text-secondary mb-2">{{ $volumes?->volume ?? '-' }}kg</div>
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tipe</h6>
                        </div>
                        <div class="col-sm-9 text-secondary mb-2">
                            @if ($volumes->type == 'Kering')
                                {{ $volumes?->type ?? '-' }} - {{ $volumes?->type_description ?? '-' }}
                            @else
                                {{ $volumes?->type ?? '-' }}
                            @endif
                        </div>
                        {{-- <div class="col-sm-9 text-secondary">{{ $volumes?->type ?? '-' }} - {{ $volumes?->type_description ?? '-' }}</div> --}}
                        <div class="col-sm-9 text-secondary">{{ $volumes?->created_at ?? '-' }}</div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="my-4">
            <h3>Data Per Hari {{ $days }}</h3>
            <div class="card mb-3">
                <div class="card-body">
                    @foreach ($perDay as $perDays)
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Volume</h6>
                        </div>
                        <div class="col-sm-9 text-secondary mb-2">{{ $perDays?->volume ?? '-' }}kg</div>
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tipe</h6>
                        </div>
                        <div class="col-sm-9 text-secondary mb-2">
                            @if ($perDays->type == 'Kering')
                                {{ $perDays?->type ?? '-' }} - {{ $perDays?->type_description ?? '-' }}
                            @else
                                {{ $perDays?->type ?? '-' }}
                            @endif
                        </div>
                        {{-- <div class="col-sm-9 text-secondary">{{ $volumes?->type ?? '-' }} - {{ $volumes?->type_description ?? '-' }}</div> --}}
                        <div class="col-sm-9 text-secondary">{{ $perDays?->created_at ?? '-' }}</div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="my-4">
            <h3>Data Per Bulan {{ $month2 }}</h3>
            <div class="card mb-3">
                <div class="card-body">
                    @foreach ($perMonth as $perMonths)
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Volume</h6>
                        </div>
                        <div class="col-sm-9 text-secondary mb-2">{{ $perMonths?->volume ?? '-' }}kg</div>
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tipe</h6>
                        </div>
                        <div class="col-sm-9 text-secondary mb-2">
                            @if ($perMonths->type == 'Kering')
                                {{ $perMonths?->type ?? '-' }} - {{ $perMonths?->type_description ?? '-' }}
                            @else
                                {{ $perMonths?->type ?? '-' }}
                            @endif
                        </div>
                        {{-- <div class="col-sm-9 text-secondary">{{ $volumes?->type ?? '-' }} - {{ $volumes?->type_description ?? '-' }}</div> --}}
                        <div class="col-sm-9 text-secondary">{{ $perMonths?->created_at ?? '-' }}</div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
