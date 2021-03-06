<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Produk;
use App\Pelanggan;
use App\Pemesanan;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

     public function dashboard(){

        $count = Admin::count();
        $prodak = Produk::count();
        $plg = Pelanggan::count();
        $pms = Pemesanan::count();
        return view('halaman_admin/dashboard', compact('count', 'prodak', 'plg','pms', $count, $prodak, $plg, $pms) );
       
    }
      public function listadmin(Request $request){
        $datas = Admin::get();
        return view('/halaman_admin/admin',compact('datas'));
    }
    public function index()
    {
       $datas = Admin::select('id_admin','username','nama_admin','no_hp','alamat')->where('id_admin', session('id_admin'))->get();
        return view('/halaman_admin/admin',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin/tambah');
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
                'nama_admin'       => 'required|string',
                'alamat'           => 'required|string|max:100',
                'no_hp'   => 'required|string|max:255',
            
        ],
         [
                'required'      => 'Data tidak boleh kosong',
                'numeric'       => 'Data harus diisi dengan angka',
                'string'        => 'Data harus diisi dengan huruf'
               
        ]
    );
    $data = new \App\Admin();
    $data->username = $request->input('username');
    $data->password = bcrypt($request->password);
    $data->nama_admin = $request->input('nama_admin');
    $data->alamat = $request->input('alamat');
    $data->no_hp = $request->input('no_hp');
     $data->save();


        return redirect('halaman_admin/admin')->with('status','Data Berhasil Ditambahkan');
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
    public function edit($id_admin)
    {
        $data = Admin::findOrFail($id_admin);
        return view('halaman_admin/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_admin)
    {


     $this->validate($request, [
            'username'  => 'required|string|min:4|max:15',
                'password'  => 'required|min:4|max:100',
                'nama_admin'       => 'required|string',
                'alamat'           => 'required|string|max:100',
                'no_hp'   => 'required|string|max:255',
            
        ],
       [
                'required'      => 'Data tidak boleh kosong',
                'numeric'       => 'Data harus diisi dengan angka',
                'string'        => 'Data harus diisi dengan huruf'
        ]
    );



        $data = Admin::findOrFail($id_admin);
        $data->username = $request->input('username');
        $data->password = bcrypt($request->password);
        $data->nama_admin = $request->input('nama_admin');
        $data->alamat = $request->input('alamat');
        $data->no_hp = $request->input('no_hp');

        $data->update();
        return redirect()->to('halaman_admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_admin)
    {
        $hapus = Admin::findOrFail($id_admin);
        $hapus->delete();
    return redirect()->to('halaman_admin/admin');
    }
   // public function logout(Request $request) {
  //Auth::logout();
 // return redirect('/login');
    //}
}
