@extends('index')

@section('title')
    Tambah Stok
@endsection

@section('content')
<div id="content">
    <div class="formContent w-50 mt-4 p-4">
        <h1 class="font-bold mb-5">Tambah Data Barang</h1>
        <form action="{{route('tambah')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">    
                <label for="namaBarang">Nama Barang</label>
                <input type="text" name="namaBarang" id="namaBarang" class="form-control @error('namaBarang') is-invalid @enderror">
                @error('namaBarang')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="stok">Stok Barang</label>
                <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror">
                @error('stok')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="hargaBeli">Harga Beli</label>
                <input type="number" name="hargaBeli" id="hargaBeli" class="form-control @error('hargaBeli') is-invalid @enderror">
                @error('hargaBeli')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="hargaJual">Harga Jual</label>
                <input type="number" name="hargaJual" id="hargaJual" class="form-control @error('hargaJual') is-invalid @enderror">
                @error('hargaJual')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Foto Barang</label>
                <img class="img-preview img-fluid">
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary float-end mt-2">Tambah Data</button>
        </form>
    </div>
    
</div>

@endsection
