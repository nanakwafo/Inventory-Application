<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Warehouse extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $fillable=['name','location','purpose','description'];
}
