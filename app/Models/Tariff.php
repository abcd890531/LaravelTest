<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Tariff",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="taxes",
 *          description="taxes",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fees",
 *          description="fees",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="promo",
 *          description="promo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="condition",
 *          description="condition",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="policy",
 *          description="policy",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date_start",
 *          description="date_start",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="date_end",
 *          description="date_end",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="room_id",
 *          description="room_id",
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
class Tariff extends Model
{
    use SoftDeletes;

    public $table = 'tariffs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'integer',
        'taxes' => 'integer',
        'fees' => 'integer',
        'promo' => 'string',
        'condition' => 'string',
        'policy' => 'string',
        'date_start' => 'date',
        'date_end' => 'date',
        'room_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
