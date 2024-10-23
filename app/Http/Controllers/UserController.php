<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
        'title' => 'Create User',
        'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
}

    public function profile($nama = '', $kelas = '', $ipk = '')
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            // 'npm' => $npm,
            'ipk' => $ipk
        ];
        return view('profile', $data);
    }

    public function create()
    {
     $kelasModel = new Kelas();
     $kelas = $kelasModel->getKelas();
     $data = [
        'title' => 'Create User',
        'kelas' => $kelas,
     ];
     return view('create_user', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ipk' => 'nullable|numeric|min:0|max:4.00',
        ]);
    
        // Ambil user berdasarkan ID
        $user = UserModel::findOrFail($id);
    
        // Update data user
        $user->nama = $request->input('nama');
        $user->kelas_id = $request->input('kelas_id');
        $user->ipk = $request->input('ipk');
    
        // Proses upload file jika ada
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('upload/img/'), $fileName);
            $user->foto = 'upload/img/' . $fileName;
        }
    
        $user->save();
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User has been deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            // 'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ipk' => 'nullable|numeric|min:0|max:4.00',
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->move(('upload/img'), $filename);
        } else {
            $fotoPath = null;
        }
        $this->userModel->create([
            'nama' => $request->input('nama'),
            // 'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $filename,
            'ipk' => $request->ipk,
        ]);
        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);    
    }
}