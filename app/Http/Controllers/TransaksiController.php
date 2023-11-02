<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\User;
use App\Models\Koleksi;
use App\DataTables\TransaksiDataTable;
use Carbon\Carbon;

// Nama    : Muhammad Kafaby
// NIM     : 6706220149
// Kelas   : 4603

class TransaksiController extends Controller
{
    public function index(TransaksiDataTable $dataTable)
    {
        return $dataTable->render('transaksi.daftarTransaksi');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $koleksi = Koleksi::where('id', $transaksi->id)->get();
        $transaksiDetails = TransaksiDetail::where('idTransaksi', $id)->get();
        return view('transaksi.infoTransaksi', compact('transaksi','transaksiDetails'));
    }

    public function create()
    {
        $users = User::all();
        $koleksi = Koleksi::where('jumlahSisa', '>=', 3)->get();
        return view('transaksi.registrasi', compact('users','koleksi'));
    }

    public function edit($id)
    {
        $transaksiDetail = TransaksiDetail::findOrFail($id);
        $transaksi = Transaksi::findOrFail($transaksiDetail->idTransaksi);
        $koleksi = Koleksi::where('id', $transaksiDetail->idKoleksi);
        return view('transaksi.editTransaksi', compact('transaksiDetail', 'transaksi','koleksi'));
    }
    
// Nama    : Muhammad Kafaby
// NIM     : 6706220149
// Kelas   : D3IF-4604
    public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|integer|in:1,2,3',
    ]);

    $transaksiDetail = TransaksiDetail::findOrFail($id);
    $transaksiDetail->status = $request->status;
    $transaksiDetail->save();
    if ($request->status != 1) {
        $transaksiDetail->tanggalKembali = Carbon::now();
        $transaksiDetail->save();
    }
    $transaksi = Transaksi::findOrFail($transaksiDetail->idTransaksi);

    if ($request->status != 1) {
        $koleksi = Koleksi::findOrFail($transaksiDetail->idKoleksi);
        if ($koleksi) {
            $koleksi->jumlahSisa += ($request->status == 1) ? -1 : 1;
            $koleksi->jumlahKeluar += ($request->status == 1) ? 1 : -1;
            $koleksi->save();
        }
    }

    if (TransaksiDetail::where('idTransaksi', $transaksi->id)->where('status', 1)->count() == 0) {
        $transaksi->tanggalSelesai = Carbon::now();
        $transaksi->save();
    }

    return redirect()->route('transaksi.infoTransaksi', $transaksi->id)->with('success', 'Transaksi berhasil diperbarui!');
}
// Nama    : Muhammad Kafaby
// NIM     : 6706220149
// Kelas   : D3IF-4604
    public function store(Request $request)
{
    $request->validate([
        'idPeminjam' => 'required|integer',
        'transaksi1' => 'required|integer',
        'transaksi2' => 'required|integer',
        'transaksi3' => 'required|integer',
    ]);

    $transaksi = Transaksi::create([
        'idPetugas' => auth()->user()->id,
        'idPeminjam' => $request->idPeminjam,
        'tanggalPinjam' => Carbon::now(),
    ]);

    $idKoleksis = [$request->transaksi1, $request->transaksi2, $request->transaksi3];
    
    foreach ($idKoleksis as $idKoleksi) {
        TransaksiDetail::create([
            'idTransaksi' => $transaksi->id,
            'idKoleksi' => $idKoleksi,
            'status' => 1,
        ]);

        $koleksi = Koleksi::find($idKoleksi);
        $koleksi->jumlahKeluar += 1;
        $koleksi->jumlahSisa -= 1;
        $koleksi->save();
    }

    Session::flash('success', 'Transaksi berhasil ditambahkan!');
    return redirect()->route('transaksi.registrasi');
}
}