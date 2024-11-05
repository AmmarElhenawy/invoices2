<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class invoice2 extends Model
{
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
