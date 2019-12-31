<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Paymentorder extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $primaryKey = 'ordernumber';

    public $incrementing = false;

    public function orders()
    {
        return $this->hasMany('App\Order', 'ordernumber', 'ordernumber');
    }
}
