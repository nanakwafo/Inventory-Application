<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customercategory extends Model
{
    //
    protected $fillable=['name','description'];

    public function customer(){
        return $this->hasMany('App\Customer');
    }
}
