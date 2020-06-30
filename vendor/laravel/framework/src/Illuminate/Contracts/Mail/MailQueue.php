<?php

namespace Illuminate\Contracts\Mail;

interface MailQueue
{
    /**
     * Queue a new e-mail message for sending.
     *
<<<<<<< HEAD
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
=======
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @param  string|null  $queue
     * @return mixed
     */
    public function queue($view, $queue = null);

    /**
     * Queue a new e-mail message for sending after (n) seconds.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
<<<<<<< HEAD
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
=======
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @param  string|null  $queue
     * @return mixed
     */
    public function later($delay, $view, $queue = null);
}
