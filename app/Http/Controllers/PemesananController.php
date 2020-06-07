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

     $amount = pemesanan::select(DB::raw('sum(jml_pesan * harga_pcs) as total'))->where('id_pelanggan', session('id_pelanggan'))->get();
             return view('/pemesanan/pemesanan',compact('datas','amount'));
    }

    public function create()
    {
        $datas = Pelanggan::select('id_pelanggan','nama_pelanggan')->where('id_pelanggan', session('id_pelanggan'))->get();
        $prodak = Produk::select('id_produk','nama_produk','harga','ukuran')->where('id_produk', 1)->get();
        return view('/pemesanan/tambah',compact('datas', 'prodak'));

       
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'desain' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        $data = new \App\Pemesanan();
     
        $data->jml_pesan = $request->input('jml_pesan');
        $data->id_produk = $request->input('id_produk');
        $data->id_pelanggan = $request->input('id_pelanggan');
        $data->status = $request->input('status');
        $data->harga_pcs = $request->input('harga_pcs');
            
            
       
        $desain = $request->file('desain');
        $ext = $desain->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $desain->move('uploads/file/desain',$newName);
        $data->desain = $newName;
        $data->save();
    return redirect('/pemesanan/pemesanan')->with('status','Data Berhasil Ditambahkan');
    }

     public function edit($id_pemesanan)
    {
        $data = Pemesanan::findOrFail($id_pemesanan);
        return view('pemesanan/edit',compact('data'));
    }

	public function update(Request $request, $id_pemesanan)
    {
        $data = \App\Pemesanan::findOrFail($id_pemesanan);
        
        if (empty($request->file('foto_bukti')))
        {
            $data->foto_bukti = $data->foto_bukti;
        }
        else{
            unlink('uploads/file/bukti'.$data->foto_bukti); //menghapus file lama
            $foto_bukti = $request->file('foto_bukti');
            $ext = $foto_bukti->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto_bukti->move('uploads/file/bukti',$newName);
            $data->foto_bukti = $newName;
        }
        $data->save();
        return redirect('pemesanan/pemesanan')->with('status','Data Berhasil Dirubah');
    }



  public function create2()
    {
        $datas = Pelanggan::select('id_pelanggan','nama_pelanggan')->where('id_pelanggan', session('id_pelanggan'))->get();
        $prodak = Produk::select('id_produk','nama_produk','harga','ukuran')->where('id_produk', 2)->get();
        return view('/pemesanan/tambah',compact('datas', 'prodak'));

       
    }

    public function store2(Request $request)
    {
        $this->validate($request, [
            'desain' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        $data = new \App\Pemesanan();
     
        $data->jml_pesan = $request->input('jml_pesan');
        $data->id_produk = $request->input('id_produk');
        $data->id_pelanggan = $request->input('id_pelanggan');
        $data->status = $request->input('status');
        $data->harga_pcs = $request->input('harga_pcs');
            
            
       
        $desain = $request->file('desain');
        $ext = $desain->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $desain->move('uploads/file/desain',$newName);
        $data->desain = $newName;
        $data->save();
    return redirect('/pemesanan/pemesanan')->with('status','Data Berhasil Ditambahkan');
    }

     public function edit2($id_pemesanan)
    {
        $data = Pemesanan::findOrFail($id_pemesanan);
        return view('pemesanan/edit',compact('data'));
    }

    public function update2(Request $request, $id_pemesanan)
    {
        $data = \App\Pemesanan::findOrFail($id_pemesanan);
        
        if (empty($request->file('foto_bukti')))
        {
            $data->foto_bukti = $data->foto_bukti;
        }
        else{
            unlink('uploads/file/bukti'.$data->foto_bukti); //menghapus file lama
            $foto_bukti = $request->file('foto_bukti');
            $ext = $foto_bukti->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $foto_bukti->move('uploads/file/bukti',$newName);
            $data->foto_bukti = $newName;
        }
        $data->save();
        return redirect('pemesanan/pemesanan')->with('status','Data Berhasil Dirubah');
    }


}
