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
        <h5>{{ $curDate }}</h5>
        <div class="table-responsive">
            <table class="table table-light" id="tabelVolume">
                <thead class="table table-primary">
                    <tr>
                        <th scope="col">RW</th>
                        <th scope="col">RT</th>
                        <th scope="col">Volume Sampah</th>
                        <th scope="col">Tipe Sampah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $datas)
                        <tr class="">
                            <td scope="row">{{ $datas->rw }}</td>
                            <td>{{ $datas->rt }}</td>
                            <td>{{ $datas->total }}</td>
                            <td>{{ $datas->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            <script>
                let table = new DataTable('#tabelVolume');
            </script>
        </div>

    </div>
@endsection

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
