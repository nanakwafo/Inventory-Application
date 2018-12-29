<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class processSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected  $name;
    protected  $telephone;
    protected  $sender;
    protected  $messagecontent;
    
    public function __construct($name,$telephone,$sender,$messagecontent)
    {
        //
        $this->name=$name;
        $this->telephone=$telephone;
        $this->sender=$sender;
        $this->messagecontent=$messagecontent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $msisdn = $this->telephone;
        $sender = $this->sender;
        $message = $this->messagecontent;

        $msg = urlencode($message);
        $api = 'http://api.nalosolutions.com/bulksms/?username=naname&password=christ123!@&type=0&dlr=1&destination=' . $msisdn . '&source=' . $sender . '&message=' . $msg;
        file_get_contents($api);
    }
}
