<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class invoice2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'invoice_number',
        'invoice_date',
        'due_date',
        'section_id' ,
        'product',
        'amount_collection' ,
        'amount_commission' ,
        'discount',
        'rate_vat',
        'value_vat',
        'total',
        'status',
        'value_status',
        'note',
        'deleted_at',
    ];
    public function sec_id(): BelongsTo
    {
        return $this->belongsTo(section::class, 'section_id');
        // return $this->belongsTo( 'App\section');
    }
    public function prod_id(): BelongsTo
    {
        return $this->belongsTo(products::class, 'product');
        // return $this->belongsTo( 'App\section');
    }
}
