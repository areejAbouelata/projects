<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = 'files';


    public $fillable = [
        'name',
        'project_id',
    ];

}
