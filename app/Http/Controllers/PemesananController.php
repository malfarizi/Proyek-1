<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pelanggan;
use App\Pemesanan;
use Illuminate\Database\Eloquent\Collection;

use DB;
class PemesananController extends Controller
{
     public function index()
    {
            $datas = DB::table('pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'pelanggan.*', 'produk.id_produk', 'produk.nama_produk')
            ->where('pelanggan.id_pelanggan', session('id_pelanggan'))
            ->get();

             return view('/pemesanan/pemesanan',compact('datas'));
    }

    public function create()
    {
        $datas = Pelanggan::select('id_pelanggan','nama_pelanggan')->where('id_pelanggan', session('id_pelanggan'))->get();
        $prodak = Produk::get();
        return view('/pemesanan/tambah',compact('datas', 'prodak'));

       
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foto_ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        $data = new \App\Pemesanan();
     

        $data->id_produk = $request->input('id_produk');
        $data->id_pelanggan = $request->input('id_pelanggan');

            
            
       
        $foto_ktp = $request->file('foto_ktp');
        $ext = $foto_ktp->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $foto_ktp->move('uploads/file/foto_ktp',$newName);
        $data->foto_ktp = $newName;
        $data->save();
    return redirect('/detail_pemesanan/tambah')->with('status','Data Berhasil Ditambahkan');
    }

     public function edit($id_pemesanan)
    {
        $data = Pemesanan::findOrFail($id_pemesanan);
        return view('pemesanan/edit',compact('data'));
    }

	public function update(Request $request, $id_pemesanan)
    {
        $data = \App\Pemesanan::findOrFail($id_pemesanan);
        
        if (empty($request->file('foto_ktp')))
        {
            $data->foto_ktp = $data->foto_ktp;
        }
        else{
            unlink('uploads/file/bukti'.$data->foto_ktp); //menghapus file lama
            $foto_ktp = $request->file('foto_ktp');
            $ext = $foto_ktp->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto_ktp->move('uploads/file/bukti',$newName);
            $data->foto_ktp = $newName;
        }
        $data->save();
        return redirect('pemesanan/pemesanan')->with('status','Data Berhasil Dirubah');
    }
}
