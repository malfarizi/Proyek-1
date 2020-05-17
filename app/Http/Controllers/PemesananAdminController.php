<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pelanggan;
use App\Pemesanan;
use App\Transfer;
use DB;
class PemesananAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'pelanggan.*', 'produk.id_produk', 'produk.nama_produk')
            ->get();

             return view('halaman_admin/pemesanan/pemesanan',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
   public function edit($id_pemesanan)
    {
        $data = Pemesanan::findOrFail($id_pemesanan);
        return view('halaman_admin/pemesanan/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request, $id_pemesanan)
    {
        $data = \App\Pemesanan::findOrFail($id_pemesanan);
        // $data->jml_pesan = $request->input('jml_pesan');
        // $data->id_produk = $request->input('id_produk');
        // $data->id_pelanggan = $request->input('id_pelanggan');
        $data->status = $request->input('status');
        // $data->harga_pcs = $request->input('harga_pcs');
        if (empty($request->file('desain')))
        {
            $data->desain = $data->desain;
        }
        else{
            unlink('uploads/file/'.$data->desain); //menghapus file lama
            $desain = $request->file('desain');
            $ext = $desain->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $desain->move('uploads/file',$newName);
            $data->desain = $newName;
        }
        $data->save();
        return redirect('halaman_admin/pemesanan/pemesanan')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemesanan)
    {
        $hapus = Pemesanan::findOrFail($id_pemesanan);
        $hapus->delete();
    return redirect()->to('halaman_admin/pemesanan/pemesanan');
    }
}
