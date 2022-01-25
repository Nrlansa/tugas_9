<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        //$datas = Produk::all();
        $datas = Produk::where('nama','LIKE','%'.$keyword.'%')
        ->orWhere('nama','LIKE', '%'.$keyword.'%')
        ->get();

        return view('produk.index', compact('datas','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new produk;
        return view('produk.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new produk;
        $model -> nama = $request->nama;
        $model -> berat = $request->berat;
        $model -> harga =$request->harga;
        $model -> stok = $request -> stok;
        $model -> deskripsi =$request -> deskripsi;
        $model -> save();

        return redirect('produk')-> with('success','Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = produk::find($id);
        return view('produk.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = produk::find($id);
        return view('tamplate.utils.Edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = produk::find($id);
        $model -> nama = $request->nama;
        $model -> berat = $request->berat;
        $model -> harga =$request->harga;
        $model -> stok = $request -> stok;
        $model -> deskripsi =$request -> deskripsi;
        $model -> save();

        return redirect('produk') -> with('success','Data berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = produk::find($id);
        $model->delete();
        return redirect('produk') -> with('success','Data berhasil Dihapus');
    }
}
