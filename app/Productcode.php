<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Productcode extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $primaryKey = 'productcode';

    public $incrementing = false;
    
    protected $fillable =['name','productcode','reorderlimit'];

    public function product(){
        return $this->hasOne('App\Product');
    }
}
