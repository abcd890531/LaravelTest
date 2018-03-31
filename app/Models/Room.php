<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Room",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type_availability",
 *          description="type_availability",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="total_people",
 *          description="total_people",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="king",
 *          description="king",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="daybed",
 *          description="daybed",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="balcony",
 *          description="balcony",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="hotel_id",
 *          description="hotel_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'type_availability',
        'total_people',
        'king',
        'daybed',
        'balcony',
        'hotel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'type_availability' => 'string',
        'total_people' => 'integer',
        'king' => 'integer',
        'daybed' => 'integer',
        'balcony' => 'integer',
        'hotel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
