<?php

namespace App\DataTables;

use App\User;
use App\Post;
use Yajra\DataTables\Services\DataTable;


class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action',function($query)
            {
                
                return "<input type='button' class='btn btn-xs btn-primary' onclick='hello($query->id)' value='delete'>

                    <input type='button' class='btn btn-xs btn-primary' onclick='hello($query->id)' value='edit'>



                ";
             }   

        );

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
         $user=$model->newQuery()->select('users.id', 'users.name','users.email')->where('id',1);
         
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '160px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'email',
            
           
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
