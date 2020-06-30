<?php

namespace Illuminate\Contracts\Cookie;

interface QueueingFactory extends Factory
{
    /**
     * Queue a cookie to send with the next response.
     *
     * @param  array  $parameters
     * @return void
     */
    public function queue(...$parameters);

    /**
     * Remove a cookie from the queue.
     *
     * @param  string  $name
<<<<<<< HEAD
     */
    public function unqueue($name);
=======
     * @param  string|null  $path
     */
    public function unqueue($name, $path = null);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Get the cookies which have been queued for the next request.
     *
     * @return array
     */
    public function getQueuedCookies();
}
