<?php

namespace App\Models;

use Eloquent as Model;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 * @package App\Models
 * @version November 2, 2020, 3:58 pm UTC
 *
 * @property string $title
 * @property string $note
 * @property integer $user_id
 */
class Note extends Model
{
    use SoftDeletes;

    public $table = 'notes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'note',
        'user_id' ,
        'project_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'note' => 'string',
        'user_id' => 'integer' ,
        'project_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

}
