<?php

namespace App\DataTables;
 
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
 
class UserDataTable extends DataTable
{
    // Nama    : Muhammad Kafaby
    // NIM     : 6706220149
    // Kelas   : D3IF-4604
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('gender', function ($data) {
            switch ($data->gender) {
                case 1:
                    return 'Laki-Laki';
                    break;
                case 0:
                    return 'Perempuan';
                    break;
                default:
                    return 'Tidak Diketahui';
            }
        })
        ->setRowId('id')
        ->editColumn('view', function($data) {
            return view('user.viewPengguna', ['username' => $data->username]);
        })
        ->editColumn('action', function($data) {
            return view('user.actionPengguna', ['username' => $data->username]);
        })
        ->editColumn('created_at', function ($data) {
            return $data->created_at->format('Y-m-d H:i:s');
        })
        ->editColumn('updated_at', function ($data) {
            return $data->updated_at->format('Y-m-d H:i:s');
        });
    }
 
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }
 
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add')
                        ->action('window.location.href = "'.route('user.registrasi').'"')
                        ->className('btn-dark')
                        ->text('Tambah'),
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                    ]);
    }
 
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('fullname'),
            Column::make('username'),
            Column::make('religion'),
            Column::make('gender'),
            Column::make('email'),
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
 
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}