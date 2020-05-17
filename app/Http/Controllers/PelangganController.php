<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Produk;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   public function dashboard()
    {
        $datas = Produk::get();
        return view('halaman_pelanggan/dashboard',compact('datas'));
    }
    public function index()
    {
        //
    }
public function pelanggan(Request $request){
        $datas = Pelanggan::get();
        return view('/halaman_pelanggan/pelanggan',compact('datas'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_pelanggan/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Pelanggan::create([

    'username' => $request->input('username'),
    'password' => bcrypt($request->input('password')),
    'nama_pelanggan' => $request->input('nama_pelanggan'),
    'alamat' => $request->input('alamat'),
    'no_hp' => $request->input('no_hp')]);
    return redirect()->to('halaman_pelanggan/pelanggan')->with('status','Data Berhasil Ditambahkan');
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
    public function edit($id_pelanggan)
    {
        $data = Pelanggan::findOrFail($id_pelanggan);
        return view('halaman_pelanggan/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelanggan)
    {
        $data = Pelanggan::findOrFail($id_pelanggan);
        $data->username = $request->input('username');
        $data->password = bcrypt($request->password);
        $data->nama_pelanggan = $request->input('nama_pelanggan');
        $data->alamat = $request->input('alamat');
        $data->no_hp = $request->input('no_hp');

        $data->update();
        return redirect()->to('halaman_pelanggan/pelanggan')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelanggan)
    {
        $hapus = Pelanggan::findOrFail($id_pelanggan);
        $hapus->delete();
    return redirect()->to('halaman_pelanggan/pelanggan')->with('status','Data Berhasil Dihapus');
    }
}
