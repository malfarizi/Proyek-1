<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pelanggan;
use App\Pemesanan;
use App\Transfer;
use DB;

class TransferAdminController extends Controller
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
            ->get();

             return view('halaman_admin/transfer/transfer',compact('datas'));
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
      public function destroy($id_transfer)
    {
        $hapus = Transfer::findOrFail($id_transfer);
        $hapus->delete();
    return redirect()->to('halaman_admin/transfer/transfer');
    }
}
