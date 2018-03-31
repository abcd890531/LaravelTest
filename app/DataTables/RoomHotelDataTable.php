<?php

namespace App\DataTables;

use App\Models\Hotel;
use App\Models\Room;
use Form;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Services\DataTable;


class RoomHotelDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
	 
	protected $idHotel;
	 
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
			->addColumn('action', 'rooms.datatables_actions')
			->addColumn('name', 'rooms.datatables_name')
			->addColumn('type_availability', 'rooms.datatables_typeAvailab')
			->addColumn('data', 'rooms.datatables_data')
			
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
	 
	
  
    public function query()
    {
	  
        $rooms = Room::query()->where('hotel_id', $this->idHotel);	   
		
        return $this->applyScopes($rooms);
    }

	public function SetID($idHotel)
	{
	
	   $this->idHotel = $idHotel;
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
            ->ajax('');
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
            'data' => ['name' => 'data', 'data' => 'data']
            
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
