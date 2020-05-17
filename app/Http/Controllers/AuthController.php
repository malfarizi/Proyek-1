<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function validator(array $data)
    {
        return validator::make($data, 
            [
                'nama_admin'=> 'required|max:255',
                'username'=> 'required|unique:admin',
                'password'=> 'required|confirmed',
                'alamat'=> 'required|max:255',
                'no_hp'=> 'required|max:255',
                'level'=> 'required',
            ]);
    }

    public function create(array $data)
    {
        return User::create([
            'nama_admin' => $data['nama_admin'],
            'username' => $data['username'],
            'password' => $data['password'],
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'level' => bcrypt($data['level']),

        ]);
    }
}
