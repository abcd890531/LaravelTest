<?php

namespace App\DataTables;

use App\Models\search;
use Form;
use Yajra\Datatables\Services\DataTable;

class searchDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'searches.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $searches = search::query();

        return $this->applyScopes($searches);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'date' => ['name' => 'date', 'data' => 'date'],
            'hotel_id' => ['name' => 'hotel_id', 'data' => 'hotel_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'searches';
    }
}
