<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoiceitem extends Model
{
    //
    protected $primaryKey = 'invoicenumber';

    public $incrementing = false;

    protected $fillable =['invoicenumber','store','duedate','invoicedate','customer','product','rate','quantity','total'];
}
