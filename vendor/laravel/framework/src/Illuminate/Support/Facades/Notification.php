<?php

namespace Illuminate\Support\Facades;

<<<<<<< HEAD
use Illuminate\Notifications\ChannelManager;
use Illuminate\Notifications\AnonymousNotifiable;
=======
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\ChannelManager;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Illuminate\Support\Testing\Fakes\NotificationFake;

/**
 * @method static void send(\Illuminate\Support\Collection|array|mixed $notifiables, $notification)
 * @method static void sendNow(\Illuminate\Support\Collection|array|mixed $notifiables, $notification)
 * @method static mixed channel(string|null $name = null)
 * @method static \Illuminate\Notifications\ChannelManager locale(string|null $locale)
 *
 * @see \Illuminate\Notifications\ChannelManager
 */
class Notification extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Illuminate\Support\Testing\Fakes\NotificationFake
     */
    public static function fake()
    {
        static::swap($fake = new NotificationFake);

        return $fake;
    }

    /**
     * Begin sending a notification to an anonymous notifiable.
     *
     * @param  string  $channel
     * @param  mixed  $route
     * @return \Illuminate\Notifications\AnonymousNotifiable
     */
    public static function route($channel, $route)
    {
        return (new AnonymousNotifiable)->route($channel, $route);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ChannelManager::class;
    }
}
