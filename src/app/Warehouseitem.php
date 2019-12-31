<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Warehouseitem extends Model implements AuditableContract
{
    //
    use Auditable;
    public function goodreceive(){
        return $this->belongsTo('App\Goodreceive');
    }
}
