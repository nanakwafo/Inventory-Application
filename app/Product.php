<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected  $fillable =[
        'datereceived',
        'productcode',
        'productcategory_id',
        'unit',
        'payamount',
        'quantity',
        'supplier_id',
        'remark',
    ];
    public function productcode(){
        return $this->belongsTo('App\Productcode');
    }
}
