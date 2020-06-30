<?php

namespace Illuminate\Support\Testing\Fakes;

<<<<<<< HEAD
use Illuminate\Mail\PendingMail;
use Illuminate\Contracts\Mail\Mailable;
=======
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Mail\PendingMail;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class PendingMailFake extends PendingMail
{
    /**
     * Create a new instance.
     *
     * @param  \Illuminate\Support\Testing\Fakes\MailFake  $mailer
     * @return void
     */
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send a new mailable message instance.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable $mailable;
     * @return mixed
     */
    public function send(Mailable $mailable)
    {
        return $this->sendNow($mailable);
    }

    /**
     * Send a mailable message immediately.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable $mailable;
     * @return mixed
     */
    public function sendNow(Mailable $mailable)
    {
        $this->mailer->send($this->fill($mailable));
    }

    /**
     * Push the given mailable onto the queue.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable $mailable;
     * @return mixed
     */
    public function queue(Mailable $mailable)
    {
        return $this->mailer->queue($this->fill($mailable));
    }
}
