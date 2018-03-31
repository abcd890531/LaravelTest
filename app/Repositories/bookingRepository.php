<?php

namespace App\Repositories;

use App\Models\booking;
use InfyOm\Generator\Common\BaseRepository;

class bookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'email',
        'card_number',
        'expiration_date',
        'cvCode',
        'hotel_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return booking::class;
    }
}
