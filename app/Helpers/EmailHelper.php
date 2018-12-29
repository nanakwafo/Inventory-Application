<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 12/29/2018
 * Time: 4:39 PM
 */

namespace App\Helpers;

use App\Jobs\processEmail;
use App\Emailcreator;

class EmailHelper
{
    public static function sendEmail(){
        $details=Emailcreator::all();
        foreach ($details as $d){
            $job = (new processEmail($d->name,$d->email,$d->sender,$d->messagecontent))
                ->delay(Carbon::now()->addMinutes(5));

            dispatch($job);
        }

    }
}