<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function productcode(){
        return $this->belongsTo('App\Productcode');
    }
}
