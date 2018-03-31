<?php

namespace App\DataTables;

use App\Models\Room;
use Form;
use Yajra\Datatables\Services\DataTable;

class RoomDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'rooms.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $rooms = Room::query();

        return $this->applyScopes($rooms);
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
            'name' => ['name' => 'name', 'data' => 'name'],
            'type_availability' => ['name' => 'type_availability', 'data' => 'type_availability'],
            'total_people' => ['name' => 'total_people', 'data' => 'total_people'],
            'king' => ['name' => 'king', 'data' => 'king'],
            'daybed' => ['name' => 'daybed', 'data' => 'daybed'],
            'balcony' => ['name' => 'balcony', 'data' => 'balcony'],
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
        return 'rooms';
    }
}
