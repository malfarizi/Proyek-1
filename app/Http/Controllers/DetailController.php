<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Penyewaan;
use App\Pelanggan;
use App\Detail_pemesanan;
use DB;


class DetailController extends Controller
{
 public function indexadmin()
    {
    $datas = DB::table('detail_pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'detail_pemesanan.id_pelanggan')
            ->join('produk', 'produk.id_produk', '=', 'detail_pemesanan.id_produk')
            ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'detail_pemesanan.id_pemesanan')
            ->select('pemesanan.*', 'pelanggan.*', 'produk.*', 'detail_pemesanan.*')
            ->where('pelanggan.id_pelanggan', session('id_pelanggan'))
            ->get();

     
             return view('/halaman_admin/detail_pemesanan/detail_pemesanan',compact('datas'));
    }






     public function index()
    {
   $datas = DB::table('detail_pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'detail_pemesanan.id_pelanggan')
            ->join('produk', 'produk.id_produk', '=', 'detail_pemesanan.id_produk')
            ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'detail_pemesanan.id_pemesanan')
            ->select('pemesanan.*', 'pelanggan.*', 'produk.*', 'detail_pemesanan.*')
            ->where('pelanggan.id_pelanggan', session('id_pelanggan'))
            ->get();

     
             return view('/detail_pemesanan/detail_pemesanan',compact('datas'));
    }

    public function create()
    {
 $datas = DB::table('pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'pelanggan.*', 'produk.*')
            ->where('pelanggan.id_pelanggan', session('id_pelanggan'))
            ->get();
      
        return view('/detail_pemesanan/tambah',compact('datas'));

       
    }

    public function store(Request $request)
    {
           $request->validate(
                [
                   
      
                    'jml_pesan'	=>'required|min:1',
                    'desain'	=>'required|file|image|mimes:jpeg,png,jpg|max:2048'
                   
                ],
                [
                    'required'      => 'Data tidak boleh kosong',
                    'numeric'       => 'Data harus diisi dengan angka',
                    'string'        => 'Data harus diisi dengan huruf',
                    'mimes'        => 'Format gambar tidak didukung',
                ]
            );

        
    

        $data = new \App\Detail_pemesanan();
     
        $data->jml_pesan = $request->input('jml_pesan');
        $data->harga = $request->input('harga');
        $data->status = "Pembayaran Belum Terverifikasi";
        $data->id_produk = $request->input('id_produk');
        $data->id_pelanggan = $request->input('id_pelanggan');
        $data->id_pemesanan = $request->input('id_pemesanan');

        $desain = $request->file('desain');
        $ext = $desain->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $desain->move('uploads/file/desain',$newName);
        $data->desain = $newName;

        $total = $data->harga * $data->jml_pesan;
        $data->total = $total;

        $dp = $data->total * 0.5;
        $data->dp = $dp;

        $data->save();
    return redirect('/detail_pemesanan/detail_pemesanan')->with('status','Data Berhasil Ditambahkan');
    }

     public function edit($id_detail_pemesanan)
    {
        $data = Detail_pemesanan::findOrFail($id_detail_pemesanan);
        return view('halaman_admin/detail_pemesanan/edit',compact('data'));
    }

	public function update(Request $request, $id_detail_pemesanan)
    {
        $data = \App\Detail_pemesanan::findOrFail($id_detail_pemesanan);
                $data->status = $request->input('status');
        
        $data->save();
        return redirect('halaman_admin/detail_pemesanan/')->with('status','Data Berhasil Dirubah');
    }

        public function destroy($id_detail_pemesanan)
    {
        $hapus = Detail_pemesanan::findOrFail($id_detail_pemesanan);
        $hapus->delete();
    return redirect()->to('halaman_admin/detail_pemesanan/');
    }    



    public function download($desain) 
    {
        $file_path = public_path('uploads/file/desain/'.$desain);
        return response()->download($file_path);
    }
}
