@extends('layouts.template')

@section('title', 'Data Sampah')

@section('content')

    @if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    <div class="container mt-5">
        <div class="table-responsive">
            <label for="tabelVolume">Data Volume Sampah per Hari ini ({{$curDate}})</label>
            <table class="table table-light" id="tabelVolume">
                <thead class="table table-primary">
                    <tr>
                        <th scope="col">RW</th>
                        <th scope="col">RT</th>
                        <th scope="col">Sampah Basah (kg)</th>
                        <th scope="col">Sampah Kering (kg)</th>
                        <th scope="col">Total Sampah (kg)</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td scope="row">{{ $data[0]->rw }}</td>
                            <td>{{ $data[0]->rt }}</td>
                            <td>{{ $data[0]->Basah }}</td>
                            <td>{{ $data[0]->Kering }}</td>
                            <td>{{ $data[0]->Total }}</td>
                            {{-- <td>
                                @if ($data[0]->Total == 0)
                                -
                            @else

                            Senin, 06:30 WIB
                            @endif
                            </td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[1]->rw }}</td>
                            <td>{{ $data[1]->rt }}</td>
                            <td>{{ $data[1]->Basah }}</td>
                            <td>{{ $data[1]->Kering }}</td>
                            <td>{{ $data[1]->Total }}</td>
                            {{-- <td>@if ($data[1]->Total == 0)
                                -
                            @else

                            Senin, 07:30 WIB
                            @endif
                            </td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[2]->rw }}</td>
                            <td>{{ $data[2]->rt }}</td>
                            <td>{{ $data[2]->Basah }}</td>
                            <td>{{ $data[2]->Kering }}</td>
                            <td>{{ $data[2]->Total }}</td>
                            {{-- <td>
                                @if ($data[2]->Total == 0)
                                    -
                                @else

                                Senin, 08:30 WIB
                                @endif
                            </td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[3]->rw }}</td>
                            <td>{{ $data[3]->rt }}</td>
                            <td>{{ $data[3]->Basah }}</td>
                            <td>{{ $data[3]->Kering }}</td>
                            <td>{{ $data[3]->Total }}</td>
                            {{-- <td>
                                @if ($data[3]->Total == 0)
                                    -
                                @else

                                Rabu, 06:30 WIB
                                @endif
                            </td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[4]->rw }}</td>
                            <td>{{ $data[4]->rt }}</td>
                            <td>{{ $data[4]->Basah }}</td>
                            <td>{{ $data[4]->Kering }}</td>
                            <td>{{ $data[4]->Total }}</td>
                            {{-- <td>
                                @if ($data[4]->Total == 0)
                                    -
                                @else

                                Rabu, 07:30 WIB
                                @endif
                            </td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[5]->rw }}</td>
                            <td>{{ $data[5]->rt }}</td>
                            <td>{{ $data[5]->Basah }}</td>
                            <td>{{ $data[5]->Kering }}</td>
                            <td>{{ $data[5]->Total }}</td>
                            {{-- <td>
                                Rabu, 08:30 WIB
                            </td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[6]->rw }}</td>
                            <td>{{ $data[6]->rt }}</td>
                            <td>{{ $data[6]->Basah }}</td>
                            <td>{{ $data[6]->Kering }}</td>
                            <td>{{ $data[6]->Total }}</td>
                            {{-- <td>Jumat, 06:30 WIB</td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[7]->rw }}</td>
                            <td>{{ $data[7]->rt }}</td>
                            <td>{{ $data[7]->Basah }}</td>
                            <td>{{ $data[7]->Kering }}</td>
                            <td>{{ $data[7]->Total }}</td>
                            {{-- <td>Jumat, 07:30 WIB</td> --}}
                        </tr>
                        <tr>
                            <td scope="row">{{ $data[8]->rw }}</td>
                            <td>{{ $data[8]->rt }}</td>
                            <td>{{ $data[8]->Basah }}</td>
                            <td>{{ $data[8]->Kering }}</td>
                            <td>{{ $data[8]->Total }}</td>
                            {{-- <td>Jumat, 08:30 WIB</td> --}}
                        </tr>
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script>
                let table = new DataTable('#tabelVolume', {
                    order: [[4, 'desc']]
                });
            </script>
        </div>

    </div>
@endsection

{{-- @foreach ($data as $datas)
                        <tr class="">
                            <td scope="row">{{ $datas->rw }}</td>
                            <td>{{ $datas->rt }}</td>
                            <td>{{ $datas->Basah }}</td>
                            <td>{{ $datas->Kering }}</td>
                            <td>{{ $datas->Total }}</td>
                        </tr>
                    @endforeach --}}

{{-- <h3>Waktu Sekarang: {{ $curDate }}</h3> --}}
        {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                Hari Senin
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <div class="table-responsive">
                    <table class="table table-borderless>
                            <tbody>
                                <tr class="table-light" >
                                    <td>RW {{ $data1[0]->rw }}</td>
                                    <td>{{ $data1[0]->total }}</td>
                                </tr>
                                <tr class="table-light">
                                    <td>RT {{ $data1[0]->rt }}</td>
                                    <td><b>06:30 WIB</b></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless>
                            <tbody>
                                <tr class="table-light" >
                                    <td>RW {{ $data1[1]->rw }}</td>
                                    <td>{{ $data1[1]->total }}</td>
                                </tr>
                                <tr class="table-light">
                                    <td>RT {{ $data1[1]->rt }}</td>
                                    <td><b>08:00 WIB</b></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                Hari Selasa
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <div class="table-responsive">
                    <table class="table table-borderless>
                            <tbody>
                                <tr class="table-light" >
                                    <td>RW {{ $data1[2]->rw }}</td>
                                    <td>{{ $data1[2]->total }}</td>
                                </tr>
                                <tr class="table-light">
                                    <td>RT {{ $data1[2]->rt }}</td>
                                    <td><b>07:00 WIB</b></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless>
                            <tbody>
                                <tr class="table-light" >
                                    <td>RW {{ $data1[3]->rw }}</td>
                                    <td>{{ $data1[3]->total }}</td>
                                </tr>
                                <tr class="table-light">
                                    <td>RT {{ $data1[3]->rt }}</td>
                                    <td><b>08:00 WIB</b></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

{{-- <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">No. RW</th>
                    <th scope="col">No. RT</th>
                    <th scope="col">Jumlah Sampah</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data1 as $datas)
                    <tr>
                        <td>{{$datas->rw}}</td>
                        <td>{{$datas->rt}}</td>
                        <td>{{$datas->type}}</td>
                        <td>{{$datas->total}} kg</td>
                    </tr>
                @endforeach --}}
                {{-- <tr>
                    <td>{{$groupByRWW->rw}}</td>
                    <td>{{$groupByRWW->rt}}</td>
                    <td>{{$groupByRWW->type}}</td>
                    <td>{{$groupByRWW->total}} kg</td>
                </tr> --}}
                        {{-- @foreach ($day as $days)
                        <tr>
                        <td>#</td>
                        <td>
                                {{ $days }}
                        </td>
                        <td>test</td>
                        <td><a name="" id="" class="btn btn-success" href="#" role="button">Sudah diangkut</a></td>
                        </tr>
                        @endforeach --}}

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
            {{-- </tbody> --}}
        {{-- </table> --}}
