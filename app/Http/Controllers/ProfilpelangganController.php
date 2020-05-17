<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class ProfilpelangganController extends Controller
{
      public function profil_pelanggan()
    {
        $datas = Pelanggan::select('id_pelanggan','username','nama_pelanggan','alamat','no_hp')->where('id_pelanggan', session('id_pelanggan'))->get();
        return view('/halaman_pelanggan/pelanggan/profil_pelanggan',compact('datas'));
    }

    public function edit($id_pelanggan)
    {
        $data = Pelanggan::findOrFail($id_pelanggan);
        return view('halaman_pelanggan/pelanggan/edit',compact('data'));
    }

     public function update(Request $request, $id_pelanggan)
    {
        $data = Pelanggan::findOrFail($id_pelanggan);
        $data->username = $request->input('username');
        $data->password = bcrypt($request->password);
        $data->nama_pelanggan = $request->input('nama_pelanggan');
        $data->alamat = $request->input('alamat');

        $data->update();
        return redirect()->to('halaman_pelanggan/pelanggan/profil_pelanggan')->with('status','Data Berhasil Dirubah');
    }}
