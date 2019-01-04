<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Waste extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $fillable =['date','store_id','productcode','unit','unitcost','totalcost','remark'];
}
