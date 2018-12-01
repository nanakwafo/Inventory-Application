<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goodreceive extends Model
{
    protected $primaryKey = 'grnnumber';

    public $incrementing = false;
    //
    public function warehouseitem(){
        return $this->hasMany('App\Warehouseitem');
    }
}
