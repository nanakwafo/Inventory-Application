<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Smscreator extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $fillable =['name','telephone','sender','messagecontent'];
    
}
