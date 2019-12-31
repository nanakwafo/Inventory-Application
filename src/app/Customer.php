<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Customer extends Model implements AuditableContract
{
    //
    use Auditable;
   

    protected $fillable=['name','phonenumber','email','address','customercategory_id'];

    public  function customercategory(){
        return $this->belongsTo('App\Customercategory');
    }
}
