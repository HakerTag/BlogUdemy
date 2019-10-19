<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;


class SendAutoresponder
{

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        // var_dump('enviar autorespondedor');
        $message = $event->message;
        if (auth()->check()) {
            $message->nombre = auth()->user()->name;
            $message->email = auth()->user()->email;
        }

        Cache::flush();

        Mail::send('emails.contact',['msg' => $message],function($m)  use ($message){
            $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        });
    }
}
