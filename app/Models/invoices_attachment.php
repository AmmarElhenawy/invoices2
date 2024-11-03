<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoices_attachment extends Model
{
    protected $fillable=[
        'invoice_id',
        'file_name',
        'create_by' ,
        'invoice_number',
    ];
}
