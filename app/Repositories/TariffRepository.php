<?php

namespace App\Repositories;

use App\Models\Tariff;
use InfyOm\Generator\Common\BaseRepository;

class TariffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'price',
        'taxes',
        'fees',
        'promo',
        'condition',
        'policy',
        'date_start',
        'date_end',
        'room_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tariff::class;
    }
}
