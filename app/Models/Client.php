<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $fillable = [
        'name',
        'email',
        'phone',
        'commercial_number',
        'nationality_id',
        'password',
        'type',

    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
