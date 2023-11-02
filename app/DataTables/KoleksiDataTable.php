<?php

namespace App\DataTables;

use App\Models\Koleksi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KoleksiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('jenisKoleksi', function ($data) {
            switch ($data->jenisKoleksi) {
                case 1:
                    return 'Buku';
                    break;
                case 2:
                    return 'Majalah';
                    break;
                case 3:
                    return 'Cakram Digital';
                    break;
                default:
                    return 'Tidak Diketahui';
            }
        })
        ->setRowId('id')
        ->editColumn('view', function($data) {
            return view('koleksi.viewKoleksi', ['id' => $data->id]);
        })
        ->editColumn('action', function($data) {
            return view('koleksi.actionKoleksi', ['id' => $data->id]);
        })
        ->editColumn('created_at', function ($data) {
            return $data->created_at->format('Y-m-d H:i:s');
        })
        ->editColumn('updated_at', function ($data) {
            return $data->updated_at->format('Y-m-d H:i:s');
        });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Koleksi $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('koleksi-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add')
                        ->action('window.location.href = "'.route('koleksi.registrasi').'"')
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

    /**
     * Get the dataTable columns definition.
     */
    // public function getColumns(): array
    // {
    //     return [
    //         Column::make('id'),
    //         Column::make('namaKoleksi'),
    //         Column::make('jenisKoleksi'),
    //         Column::make('jumlahKoleksi'),
    //         Column::make('jumlahKeluar'),
    //         Column::make('jumlahSisa'),
    //         Column::make('created_at'),
    //         Column::make('updated_at'),
    //     ];
    // }
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('namaKoleksi'),
            Column::make('jenisKoleksi'),
            Column::make('jumlahKoleksi'),
            Column::make('jumlahKeluar'),
            Column::make('jumlahSisa'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('view')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center')
            ->searchable(false)
            ->orderable(false),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center')
            ->searchable(false)
            ->orderable(false),
        ];
    }
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Koleksi_' . date('YmdHis');
    }
}