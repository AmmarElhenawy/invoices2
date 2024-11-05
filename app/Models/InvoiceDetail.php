<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceDetail extends Model
{
    protected $fillable=[
        'id_invoice',
        'invoice_number',
        'section' ,
        'product',
        'status',
        'value_status',
        'note',
        'user',
    ];
    public function sec_id(): BelongsTo
    {
        return $this->belongsTo(section::class, 'section');
        // return $this->belongsTo( 'App\section');
    }
    public function prod_id(): BelongsTo
    {
        return $this->belongsTo(products::class, 'product');
        // return $this->belongsTo( 'App\section');
    }
}
