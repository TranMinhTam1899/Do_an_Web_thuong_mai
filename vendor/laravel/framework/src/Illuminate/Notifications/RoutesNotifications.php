<?php

namespace Illuminate\Notifications;

<<<<<<< HEAD
use Illuminate\Support\Str;
use Illuminate\Contracts\Notifications\Dispatcher;
=======
use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Support\Str;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

trait RoutesNotifications
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $instance
     * @return void
     */
    public function notify($instance)
    {
        app(Dispatcher::class)->send($this, $instance);
    }

    /**
     * Send the given notification immediately.
     *
     * @param  mixed  $instance
     * @param  array|null  $channels
     * @return void
     */
    public function notifyNow($instance, array $channels = null)
    {
        app(Dispatcher::class)->sendNow($this, $instance, $channels);
    }

    /**
     * Get the notification routing information for the given driver.
     *
     * @param  string  $driver
     * @param  \Illuminate\Notifications\Notification|null  $notification
     * @return mixed
     */
    public function routeNotificationFor($driver, $notification = null)
    {
        if (method_exists($this, $method = 'routeNotificationFor'.Str::studly($driver))) {
            return $this->{$method}($notification);
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return $this->email;
<<<<<<< HEAD
            case 'nexmo':
                return $this->phone_number;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
    }
}
