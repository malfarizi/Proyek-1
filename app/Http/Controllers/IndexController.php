<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class IndexController extends Controller
{
    public function index()
    {
        $datas = Produk::get();
        return view('/index',compact('datas'));
    }
    public function tracking()
    {
        $datas = Produk::get();
        return view('/tracking',compact('datas'));
    }
}
