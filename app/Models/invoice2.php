<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
