<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'ordernumber';

    public $incrementing = false;

    protected $fillable =['ordernumber','store','orderdate','ordertime','customer','product','rate','quantity','total'];
}
