<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Order extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $primaryKey = 'ordernumber';

    public $incrementing = false;

    protected $fillable =['ordernumber','store','orderdate','ordertime','customer','product','rate','quantity','total'];
}
