<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMorale extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $booster;
    private $row;

    public function __construct($booster, $row)
    {
        $this->booster = $booster;
        $this->row = $row;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $booster = $this->booster;
        $row = $this->row;

        return $this->view('emails.booster', compact('booster', 'row'))
            ->subject('Work Morale Booster');
    }
}
