@extends('index')

@push('css')
    <link rel="stylesheet" href="{{asset('asses/index.css')}}">
@endpush

@section('title')
    Test Nutech
@endsection

@section('content')
<div id="content">
    <a href="{{route('tambahData')}}" class="float-end p-2"><button class="btn btn-secondary">Tambah Data</button></a>
    <div class="row pt-5">
        @foreach ($stok as $no => $data)
        <div class="col">
            <div class="cards d-flex justify-content-center">
                <a href="{{route('show', ['id' => $data->id])}}" class="text-decoration-none text-body">
                    <div class="card mt-2 w-100">
                        <img src="{{asset('img/' . $data->fotoBarang)}}" class="card-img-top">
                        <div class="card-body">
                            <p class="text-center text-uppercase fw-bold">{{$data->namaBarang}}</p>
                            <ul class="list-group">
                                <li class="list-group-item">Sisa Stok = {{$data->stok}}</li>
                                <li class="list-group-item">Harga Beli = Rp. {{$data->hargaBeli}}</li>
                                <li class="list-group-item">Harga Jual = Rp. {{$data->hargaJual}}</li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
        @endforeach
    </div>
    {!! $stok->links() !!}
</div>
@endsection