<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Paymentinvoice extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $primaryKey = 'invoicenumber';

    public $incrementing = false;

    public function invoiceitems()
    {
        return $this->hasMany('App\Invoiceitem', 'invoicenumber', 'invoicenumber');
    }
}
