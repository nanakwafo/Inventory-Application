<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    //
    protected $fillable =['date','store_id','productcode','unit','unitcost','totalcost','remark'];
}
