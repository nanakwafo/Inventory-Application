<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaseorderitem extends Model
{
    //
    protected $fillable =['purchaseordernumber','productid','quantity','rate','amount'];
}
