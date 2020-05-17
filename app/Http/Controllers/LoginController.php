<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
       public function index()
    {
        if(!Session::get('loginadmin')){
            return redirect('loginadmin')->with('Alert','You must Login');
        } else {
            return view('halaman_admin/dashboard');
        }
        
    }

    public function loginadmin(){
        return view ('/loginadmin');
    }

    public function loginadminPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=Admin::where('username',$username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('nama_admin',$data->nama_admin);
                Session::put('username',$data->username);
                Session::put('password',$data->password);
                Session::put('alamat',$data->alamat);
                Session::put('no_hp',$data->no_hp);
                

                Session::put('loginadmin',TRUE);
                return redirect('/halaman_admin/dashboard');
            }
            else {
                return redirect('loginadmin')->with('alert', 'login yang bener woy !');
            }
        } else {
            return redirect('loginadmin')->with('alert', 'Your Password Incorrect !');
        }
    }

    public function logoutadmin(){
        Session::flush();
        return redirect('loginadmin')->with ('alert', 'Your Was Logout');
    }

    public function registeradmin(Request $request){

        $nama_admin= $request->input('nama_admin');
        $username= $request->input('username');
        $password= $request->input('password');
        $alamat= $request->input('alamat');
        $no_hp= $request->input('no_hp');
       
        return view('registeradmin');
    }
    public function registeradminPost(Request $request){
        $this->validate($request, [

            'nama_admin' => 'required|min:4|unique:admin',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
            'alamat' => 'required|min:4',
            'no_hp' => 'required|min:4',
            

        ]);

        $data =  new admin();

        $data->nama_admin = $request->nama_admin;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
       

        $data->save();
        return redirect('loginadmin')->with('alert-success','Kamu berhasil Register');
    }


     public function loginpelanggan(){
        return view ('/loginpelanggan');
    }

    public function loginpelangganPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=pelanggan::where('username',$username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_pelanggan',$data->id_pelanggan);
                Session::put('nama_pelanggan',$data->nama_pelanggan);
                Session::put('alamat',$data->alamat);
                Session::put('no_hp',$data->no_hp);
                Session::put('username',$data->username);
                Session::put('password',$data->password);

                Session::put('loginpelanggan',TRUE);
                return redirect('/halaman_pelanggan/dashboard');
            }
            else {
                return redirect('loginpelanggan')->with('alert', 'return to login');
            }
        } else {
            return redirect('loginpelanggan')->with('alert', 'Your Password Incorrect !');
        }
    }


    public function registerpelanggan(Request $request){

        $nama_pelanggan= $request->input('nama_pelanggan');
        $username= $request->input('username');
        $password= $request->input('password');
        $alamat= $request->input('alamat');
        $no_hp= $request->input('no_hp');
        return view('registerpelanggan');
    }
    public function registerpelangganPost(Request $request){
        $this->validate($request, [

            'nama_pelanggan' => 'required|min:4|unique:pelanggan',
            'alamat' => 'required|min:4',
            'username' => 'required|min:4',
            'password' => 'required|min:4',
            'alamat' => 'required|min:4',
            'no_hp' => 'required|min:4',

        ]);

        $data =  new pelanggan();

        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->username = $request->username;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
       $data->password = bcrypt($request->password);


        $data->save();
        return redirect('loginpelanggan')->with('alert-success','Kamu berhasil Register');
    }


    public function logoutpelanggan(){
        Session::flush();
        return redirect('loginpelanggan')->with ('alert', 'Your Was Logout');
    }
}