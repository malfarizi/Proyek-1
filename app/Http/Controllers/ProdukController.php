<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas = Produk::get();
        return view('/halaman_admin/produk/produk',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin/produk/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        $data = new \App\Produk();
        $data->nama_produk = $request->input('nama_produk');
        $data->deskripsi_produk = $request->input('deskripsi_produk');
        $data->ukuran = $request->input('ukuran');
        $data->harga = $request->input('harga');
        $foto_produk = $request->file('foto_produk');
        $ext = $foto_produk->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $foto_produk->move('uploads/file',$newName);
        $data->foto_produk = $newName;
        $data->save();
    return redirect('halaman_admin/produk/produk')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produk)
    {
        $data = Produk::findOrFail($id_produk);
        return view('halaman_admin/produk/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $data = \App\Produk::findOrFail($id_produk);
        $data->nama_produk = $request->input('nama_produk');
        $data->deskripsi_produk = $request->input('deskripsi_produk');
        $data->ukuran = $request->input('ukuran');
        $data->harga = $request->input('harga');
        if (empty($request->file('foto_produk')))
        {
            $data->foto_produk = $data->foto_produk;
        }
        else{
            unlink('uploads/file/'.$data->foto_produk); //menghapus file lama
            $foto_produk = $request->file('foto_produk');
            $ext = $foto_produk->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto_produk->move('uploads/file',$newName);
            $data->foto_produk = $newName;
        }
        $data->save();
        return redirect('halaman_admin/produk/produk')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
                $hapus = Produk::findOrFail($id_produk);
        $hapus->delete();
    return redirect()->to('halaman_admin/produk/produk');
    }
}
