<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Customercategory extends Model implements AuditableContract
{
    //
    use Auditable;
    protected $fillable=['name','description'];

    public function customer(){
        return $this->hasMany('App\Customer');
    }
}
