<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class sendmailverify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;

    public function __construct($name)
    {

        $this->name = $name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ghajar@alaedin.travel')->subject('verify')->view('mail.index')->with('link', $this->generate());
    }

    protected function generate()
    {

        $url = URL::temporarySignedRoute(
            'verifycodeee',
            now()->addMinutes(60),
            [
                'id' => '5',
                'email' => Auth::user()->email,

            ]
        );
        return $url;

    }


}
