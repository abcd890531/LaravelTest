<?php

namespace App\DataTables;

use App\Models\Tariff;
use Form;
use Yajra\Datatables\Services\DataTable;

class TariffDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'tariffs.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $tariffs = Tariff::query();

        return $this->applyScopes($tariffs);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns(),"action")
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
            'price' => ['name' => 'price', 'data' => 'price'],
            'taxes' => ['name' => 'taxes', 'data' => 'taxes'],
            'fees' => ['name' => 'fees', 'data' => 'fees'],
            'promo' => ['name' => 'promo', 'data' => 'promo'],
            'condition' => ['name' => 'condition', 'data' => 'condition'],
            'policy' => ['name' => 'policy', 'data' => 'policy'],
            'date_start' => ['name' => 'date_start', 'data' => 'date_start'],
            'date_end' => ['name' => 'date_end', 'data' => 'date_end'],
            'room_id' => ['name' => 'room_id', 'data' => 'room_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tariffs';
    }
}
