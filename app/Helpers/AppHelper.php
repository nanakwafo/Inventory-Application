<?php
namespace App\Helpers;

use Illuminate\Support\Collection;
use DB;
class AppHelper
{
    public static function profileimage()
    {
        return  DB::table('profiles')->first();

    }


}