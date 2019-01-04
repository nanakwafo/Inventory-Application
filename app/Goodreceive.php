<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Goodreceive extends Model implements AuditableContract
{
    use Auditable;
    protected $primaryKey = 'grnnumber';

    public $incrementing = false;
    //
    public function warehouseitem(){
        return $this->hasMany('App\Warehouseitem');
    }
}
