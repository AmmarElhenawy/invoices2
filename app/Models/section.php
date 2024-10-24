<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable=[
        'created_by',
        'section_name',
        'description',
    ];
}
