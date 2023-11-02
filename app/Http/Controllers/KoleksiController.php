<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Koleksi;
use App\DataTables\KoleksiDataTable;

class KoleksiController extends Controller
{

    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604

    // public function index() {
    //     $koleksi = Koleksi::all();
    //     return view('koleksi.daftarKoleksi', compact('koleksi'));
    // }
        
    public function index(KoleksiDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    public function show($id)
    {
        $koleksi = Koleksi::findOrFail($id);
        return view('koleksi.infoKoleksi', compact('koleksi'));
    }

    public function create()
    {
    return view('koleksi.registrasi');
    }

    public function edit($id)
    {
        $koleksi = Koleksi::findOrFail($id);
        return view('koleksi.editKoleksi', compact('koleksi'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenisKoleksi' => 'required|string|max:255',
            'jumlahKeluar' => 'required|integer|max:' . Koleksi::find($id)->jumlahKoleksi,
        ]);

        $koleksi = Koleksi::findOrFail($id);
        $koleksi->update([
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKeluar' => $request->jumlahKeluar,
            'jumlahSisa' => $koleksi->jumlahKoleksi - $request->jumlahKeluar,
        ]);

        return redirect()->route('koleksi.daftarKoleksi')->with('success', 'Koleksi berhasil diperbarui!');
    }
    
    public function store(Request $request)
    {
    $request->validate([
        'namaKoleksi' => 'required|string|max:255',
        'jenisKoleksi' => 'required|string|max:255',
        'jumlahKoleksi' => 'required|integer',
    ]);
    Koleksi::create([
        'namaKoleksi' => $request->namaKoleksi,
        'jenisKoleksi' => $request->jenisKoleksi,
        'jumlahKoleksi' => $request->jumlahKoleksi,
        'jumlahSisa' => 0,
        'jumlahKeluar' => 0,
    ]);
    // return redirect()->route('koleksi.store')->with('success', 'Koleksi berhasil ditambahkan!');
    Session::flash('success', 'Koleksi berhasil ditambahkan!');
    return redirect()->route('koleksi.registrasi');
}

}