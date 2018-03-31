<?php

namespace App\Repositories;

use App\Models\Hotel;
use InfyOm\Generator\Common\BaseRepository;

class HotelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'picture',
        'name',
        'classification',
        'address',
        'price',
		'included'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Hotel::class;
    }
}
