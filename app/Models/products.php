<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable=[
        'product_name',
        // 'section_name',
        'description',
    ];}
