<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentorder extends Model
{
    //
    protected $primaryKey = 'ordernumber';

    public $incrementing = false;

    public function orders()
    {
        return $this->hasMany('App\Order', 'ordernumber', 'ordernumber');
    }
}
