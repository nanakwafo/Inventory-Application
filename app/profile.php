<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class profile extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $fillable=['companyname','phone','email','address','mobile','website','fax'];
    protected $guarded=['logo'];
}
