<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Purchase extends Model implements AuditableContract
{
    //
    use Auditable;
    protected  $fillable =[
        'datereceived',
        'productcode',
        'productcategory_id',
        'unit',
        'unitprice',
        'payamount',
        'quantity',
        'supplier_id',
        'remark',
        'reorderlimit',
    ];
    public function productcode(){
        return $this->belongsTo('App\Productcode');
    }
}
