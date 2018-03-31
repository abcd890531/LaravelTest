<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="booking",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="card_number",
 *          description="card_number",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="expiration_date",
 *          description="expiration_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="cvCode",
 *          description="cvCode",
 *          type="string"
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
class booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'email',
        'card_number',
        'expiration_date',
        'cvCode',
        'hotel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'email' => 'string',
        'expiration_date' => 'date',
        'cvCode' => 'string',
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
