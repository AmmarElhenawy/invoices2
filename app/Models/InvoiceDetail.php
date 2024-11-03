<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
