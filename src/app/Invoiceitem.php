<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Invoiceitem extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $primaryKey = 'invoicenumber';

    public $incrementing = false;

    protected $fillable =['invoicenumber','store','duedate','invoicedate','customer','product','rate','quantity','total'];
}
