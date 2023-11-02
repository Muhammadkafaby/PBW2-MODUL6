<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604
    
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.daftarPengguna');
    }

    public function showUser($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('user.infoPengguna', compact('user'));
    }

    public function create()
    {
        return view('user.registrasi');
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('user.editPengguna', compact('user'));
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $username)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:15',
        ]);

        $user = User::where('username', $username)->firstOrFail();
        $data = [
            'fullname' => $request->fullname,
            'password' => $request->password,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user.daftarPengguna')->with('success', 'Profil pengguna berhasil diperbarui!');
    }
}