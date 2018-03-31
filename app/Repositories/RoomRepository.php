<?php

namespace App\Repositories;

use App\Models\Room;
use InfyOm\Generator\Common\BaseRepository;

class RoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type_availability',
        'total_people',
        'king',
        'daybed',
        'balcony',
        'hotel_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Room::class;
    }
}
