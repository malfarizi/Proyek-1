<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pelanggan;
use App\Pemesanan;
use App\Transfer;
use DB;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('transfer')
            ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'transfer.id_pemesanan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'transfer.id_pelanggan')
            ->select('pemesanan.*', 'pelanggan.*', 'transfer.*')
            ->where('pelanggan.id_pelanggan', session('id_pelanggan'))
            ->get();

             return view('/transfer/transfer',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Pelanggan::select('id_pelanggan','nama_pelanggan')->where('id_pelanggan', session('id_pelanggan'))->get();
        $pms = Pemesanan::select('id_pemesanan','id_produk','id_pelanggan')->where('id_pelanggan', session('id_pelanggan'))->get();
        return view('/transfer/tambah',compact('datas', 'pms'));
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
            'foto_transfer' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);    

          $data = new \App\Transfer();
$data->id_pelanggan = $request->input('id_pelanggan');
$data->id_pemesanan = $request->input('id_pemesanan');
        
        $foto_transfer = $request->file('foto_transfer');
        $ext = $foto_transfer->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $foto_transfer->move('uploads/file/foto_transfer',$newName);
        $data->foto_transfer = $newName;
        $data->save();
    return redirect('/transfer/transfer')->with('status','Data Berhasil Ditambahkan');


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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
