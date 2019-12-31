<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 12/29/2018
 * Time: 2:03 PM
 */

namespace App\Helpers;


use App\Jobs\processSMS;
use App\Smscreator;
use Carbon\Carbon;

class SmsHelper
{
    public static function sendSMS(){
        $details=Smscreator::all();
        foreach ($details as $d){
            $job = (new processSMS($d->name,$d->telephone,$d->sender,$d->messagecontent))
                ->delay(Carbon::now()->addMinutes(5));

            dispatch($job);
        }

    }

}