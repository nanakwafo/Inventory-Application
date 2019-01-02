<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected  $name;
    protected  $email;
    protected  $sender;
    protected  $messagecontent;
    
    public function __construct($name,$email,$sender,$messagecontent)
    {
        //
        $this->name=$name;
        $this->email=$email;
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

        $data = array(
            'name'=>$this->name,
            'email'=>$this->email,
            'bodymessage'=>$this->messagecontent
        );

        Mail::send(['text'=>'mail.mail'], $data, function($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('Message Alert');
            $message->from('nanamensah1140@gmail.com','onetech');
        });
        echo "Basic Email Sent. Check your inbox.";

    }
}
