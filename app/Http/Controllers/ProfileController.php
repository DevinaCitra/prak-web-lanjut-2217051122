<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $ipk = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'ipk' => $ipk,
        ];
        return view('profile',$data);
    }
}