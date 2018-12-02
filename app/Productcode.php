<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcode extends Model
{
    //
    protected $primaryKey = 'productcode';

    public $incrementing = false;
    
    protected $fillable =['name','productcode'];

    public function product(){
        return $this->hasOne('App\Product');
    }
}
