<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentinvoice extends Model
{
    //
    protected $primaryKey = 'invoicenumber';

    public $incrementing = false;

    public function invoiceitems()
    {
        return $this->hasMany('App\Order', 'invoicenumber', 'invoicenumber');
    }
}
