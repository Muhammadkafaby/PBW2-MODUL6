<?php

namespace App\DataTables;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransaksiDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn('Petugas', function($data) {
                return $data->petugas->fullname;
            })
            ->editColumn('Pinjam', function($data) {
                return $data->peminjam->fullname;
            })
            ->editColumn('tanggalPinjam', function ($data) {
                return $data->tanggalPinjam;
            })
            ->editColumn('tanggalSelesai', function ($data) {
                return $data->tanggalSelesai;
            })
            ->editColumn('action', function($data) {
                return view('transaksi.actionTransaksi', ['id' => $data->id]);
            });
    }
    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604
    public function query(Transaksi $model): QueryBuilder
    {
        return $model->newQuery()
            ->join('users as petugas', 'transaksi.idPetugas', '=', 'petugas.id')
            ->join('users as peminjam', 'transaksi.idPeminjam', '=', 'peminjam.id')
            ->select('transaksi.*', 'petugas.fullname as petugas_fullname', 'peminjam.fullname as peminjam_fullname')
            ->with(['petugas', 'peminjam']); // Load relasi petugas dan peminjam
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('transaksi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('add')
                    ->action('window.location.href = "'.route('transaksi.registrasi').'"')
                    ->className('btn-dark')
                    ->text('Tambah'),
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }
    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('petugas_fullname')
                ->title('Petugas'),
            Column::make('peminjam_fullname')
                ->title('Peminjam'),
            Column::make('tanggalPinjam')
                ->title('Tanggal Pinjam'),
            Column::make('tanggalSelesai')
                ->title('Tanggal Selesai'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false),
        ];
    }

    protected function filename(): string
    {
        return 'Transaksi_' . date('YmdHis');
    }
}