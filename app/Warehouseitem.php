<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouseitem extends Model
{
    //
    public function goodreceive(){
        return $this->belongsTo('App\Goodreceive');
    }
}
