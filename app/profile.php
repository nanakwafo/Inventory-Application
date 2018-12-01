<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    //
    protected $fillable=['companyname','phone','email','address','mobile','website','fax'];
    protected $guarded=['logo'];
}
