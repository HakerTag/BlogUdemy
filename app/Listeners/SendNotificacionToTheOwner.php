<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificacionToTheOwner
{
   
    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        // var_dump('Notificar al dueño');
        $message = $event->message;
        Mail::send('emails.contact',['msg' => $message],function($m)  use ($message){
            $m->from($message->email, $message->nombre)
            ->to('danielkage9@gmail.com', 'Daniel')
            ->subject('Recibiste un mensaje');
        });
    }
}