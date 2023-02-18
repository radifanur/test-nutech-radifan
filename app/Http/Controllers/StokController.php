<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StokController extends Controller
{
    public function getData()
    {
        $stok = Stok::paginate(4);
        return view('home', [
            'stok' => $stok
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $stok = Stok::where('namaBarang', 'like', "%" . $keyword . "%")->paginate(4);
        return view('home', [
            'stok' => $stok
        ]);
    }

    public function destroy($id)
    {
        $stok = Stok::find($id);
        $stok->delete();
        return redirect()->route('home');
    }

    public function showData($id)
    {
        $data = Stok::where('id', $id)->first();
        return view('show', [
            'data' => $data
        ]);
    }

    public function update($id)
    {
        $data = Stok::where('id', $id)->first();
        return view('update', [
            'data' => $data
        ]);
    }

    public function updatingData(Request $request, $id)
    {
        $stok = Stok::find($id);
        $validateData = $request->validate([
            'namaBarang' => 'required',
            'stok' => 'required',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
        ]);

        if ($request->file('image')) {
            $validateImage = $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:100'
            ]);
            $nameImage = md5($request->namaBarang);
            $image = $request->file('image');
            $extension = "." . $image->getClientOriginalExtension();
            $originalNameImage = $nameImage . $extension;
            $storeImage = $request->image->move(public_path('img'), $originalNameImage);
        }

        $stok = Stok::find($id);
        $stok->update($validateData);

        return redirect()->route('show', ['id' => $id]);
    }

    public function addData()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaBarang' => 'required',
            'stok' => 'required',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:100'
        ]);


        $nameImage = md5($request->namaBarang);
        $image = $request->file('image');
        $extension = "." . $image->getClientOriginalExtension();
        $originalNameImage = $nameImage . $extension;
        $storeImage = $request->image->move(public_path('img'), $originalNameImage);
        if ($storeImage) {
            Stok::create([
                'namaBarang' => $request->namaBarang,
                'hargaBeli' => $request->hargaBeli,
                'hargaJual' => $request->hargaJual,
                'stok' => $request->stok,
                'fotoBarang' => $nameImage . $extension
            ]);
            return redirect()->route('home');
        }
    }
}
