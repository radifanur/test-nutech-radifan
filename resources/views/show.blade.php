@extends('index')

@section('title')
    {{$data->namaBarang}}
@endsection

@section('content')
    <div id="content">
        <div class="row pt-5">
            <div class="col">
                <img class="img-fluid w-100" src="{{asset('img/' . $data->fotoBarang)}}" >
            </div>
            <div class="col-8">
                <ul class="list-group">
                    <li class="list-group-item text-center fw-bold">{{$data->namaBarang}}</li>
                    <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, tempore? Alias maxime laboriosam harum, perferendis adipisci ducimus non quod nesciunt odit nostrum minus ipsam officia sapiente ab laborum aliquid. Sint!</li>
                    <li class="list-group-item">Sisa Stok = {{$data->stok}}</li>
                    <li class="list-group-item">Harga Beli = {{$data->hargaBeli}}</li>
                    <li class="list-group-item">Harga Jual = {{$data->hargaJual}}</li>
                </ul>
                <div class="buttons mt-3 float-end">
                    <a href="{{route('update',['id' => $data->id])}}" class="btn btn-success">Update Data</a>
                    <a href="{{route('delete', ['id' => $data->id])}}" class="btn btn-danger delete" title="delete" onclick="return confirm('Are you sure?')">Delete Data</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.delete').click(function(){
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            window.location = "/pemilih/delete/"+id+""
            swal("Data Berhasil Di hapus", {
                icon: "success",
            });
            } else {
            swal("Data Tidak Jadi Di Hapus");
            }
        });
    </script>
@endpush