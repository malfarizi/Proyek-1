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


                $this->validate($request, [
            'username'  => 'required|string|min:4|max:15',
                'password'  => 'required|min:4|max:100',
                'nama_pelanggan'       => 'required|string',
                'alamat'           => 'required|string|max:100',
                'no_hp'   => 'required|string|max:255',
            
        ],
         [
                'required'      => 'Data tidak boleh kosong',
                'numeric'       => 'Data harus diisi dengan angka',
                'string'        => 'Data harus diisi dengan huruf'
               
        ]
    );
    $data = new \App\Pelanggan();
    $data->username = $request->input('username');
    $data->password = $request->input('password');
    $data->nama_pelanggan = $request->input('nama_pelanggan');
    $data->alamat = $request->input('alamat');
    $data->no_hp = $request->input('no_hp');
     $data->save();
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
             $this->validate($request, [
                'username'  => 'required|string|min:4|max:15',
                'password'  => 'required|min:4|max:100',
                'nama_pelanggan'       => 'required|string',
                'alamat'           => 'required|string|max:100',
                'no_hp'   => 'required|string|max:255',
            
        ],
         [
                'required'      => 'Data tidak boleh kosong',
                'numeric'       => 'Data harus diisi dengan angka',
                'string'        => 'Data harus diisi dengan huruf'
               
        ]
    );


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
