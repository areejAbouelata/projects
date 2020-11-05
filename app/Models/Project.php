<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models
 * @version November 2, 2020, 3:11 pm UTC
 *
 * @property  $name
 * @property string $payment_status
 * @property string $phone_number
 * @property number $price
 * @property string $start_date
 * @property integer $payment_updated_by
 * @property integer $client_id
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'payment_status',
        'phone_number',
        'price',
        'start_date',
        'payment_updated_by',
        'client_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_status' => 'string',
        'phone_number' => 'string',
        'price' => 'decimal:2',
        'start_date' => 'date',
        'payment_updated_by' => 'integer',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone_number' => 'required',
        'price' => 'required',
        'start_date' => 'required',
        'client_id' => 'required'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'payment_updated_by');
    }
}
