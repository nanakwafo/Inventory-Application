<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable=['name','phonenumber','address','customercategory_id'];

    public  function customercategory(){
        return $this->belongsTo('App\Customercategory');
    }
}
