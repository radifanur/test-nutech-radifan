@extends('index')

@section('title')
    Update {{$data->namaBarang}}
@endsection

@section('content')
    <div class="content">
        <div class="row pt-5">
            <div class="col">
                <img class="img-fluid w-100" src="{{asset('img/' . $data->fotoBarang)}}" >
            </div>
            <div class="col-8">
                <div class="formContent ">
                    <h1 class="font-bold mb-3">Update Data Barang</h1>
                    <form action="{{route('updating', ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">    
                            <label for="namaBarang">Nama Barang</label>
                            <input type="text" value="{{$data->namaBarang}}" name="namaBarang" id="namaBarang" class="form-control @error('namaBarang') is-invalid @enderror">
                            @error('namaBarang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">    
                            <label for="stok">Stok Barang</label>
                            <input type="number" value="{{$data->stok}}" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hargaBeli">Harga Beli</label>
                            <input type="number" value="{{$data->hargaBeli}}" name="hargaBeli" id="hargaBeli" class="form-control @error('hargaBeli') is-invalid @enderror">
                            @error('hargaBeli')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hargaJual">Harga Jual</label>
                            <input type="number" value="{{$data->hargaJual}}" name="hargaJual" id="hargaJual" class="form-control @error('hargaJual') is-invalid @enderror">
                            @error('hargaJual')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Update Foto Barang</label>
                            <img class="img-preview img-fluid">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-2">Updata Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection