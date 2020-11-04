<?php

namespace App\DataTables;

use App\Models\Project;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ProjectDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.projects.datatables_actions')->editColumn('client_id', function ($q) {
            return $q->client->name;
        })->editColumn('payment_updated_by', function ($q) {
            if ($q->created_at == $q->updated_at) {
                return __('crud.noUpdates');
            }

             $name =   $q->updatedBy->name;
            return '<a href="'.route('users.show', [$q->updatedBy->id]).'">'.$name."</a>" ;
        })->rawColumns(['action', 'client_id' , 'payment_updated_by']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    [
                        'extend' => 'create',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-plus"></i> ' . __('auth.app.create') . ''
                    ],
                    [
                        'extend' => 'export',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> ' . __('auth.app.export') . ''
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-print"></i> ' . __('auth.app.print') . ''
                    ],
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> ' . __('auth.app.reset') . ''
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-refresh"></i> ' . __('auth.app.reload') . ''
                    ],
                ],
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name' => new Column(['title' => __('models/projects.fields.name'), 'data' => 'name']),
            'payment_status' => new Column(['title' => __('models/projects.fields.payment_status'), 'data' => 'payment_status']),
            'phone_number' => new Column(['title' => __('models/projects.fields.phone_number'), 'data' => 'phone_number']),
            'price' => new Column(['title' => __('models/projects.fields.price'), 'data' => 'price']),
            'start_date' => new Column(['title' => __('models/projects.fields.start_date'), 'data' => 'start_date']),
            'payment_updated_by' => new Column(['title' => __('models/projects.fields.payment_updated_by'), 'data' => 'payment_updated_by']),
            'client_id' => new Column(['title' => __('models/projects.fields.client_id'), 'data' => 'client_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'projects_datatable_' . time();
    }
}
