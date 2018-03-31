<?php

namespace App\DataTables;

use App\Models\Hotel;
use Form;
use Yajra\Datatables\Services\DataTable;

class HotelDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
			->addColumn('action', 'hotels.datatables_actions')
			->addColumn('picture', 'hotels.datatables_picture')
			->addColumn('classification', 'hotels.datatables_stars')
			->addColumn('name', 'hotels.datatables_name')
			->addColumn('price', 'hotels.datatables_price')
			->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $hotels = Hotel::query();

        return $this->applyScopes($hotels);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
          	->columns($this->getColumns(),'Conditions')
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
		    'picture' =>  ['name' => 'picture',  'data' => 'picture'],
		    'name' => ['name' => 'name', 'data' => 'name'],
            'classification' => ['name' => 'classification', 'data' => 'classification'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'price' => ['name' => 'price', 'data' => 'price']
			
        ];
    }
	
	

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'hotels';
    }
}
