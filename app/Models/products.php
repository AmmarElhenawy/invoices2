<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class products extends Model
{
    protected $fillable=[
        'product_name',
        'section_name',
        'section_id',
        'description',
    ];
    public function sec_id(): BelongsTo
    {
        return $this->belongsTo(section::class, 'section_id');
        // return $this->belongsTo( 'App\section');
    }

}
