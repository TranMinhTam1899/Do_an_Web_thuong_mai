<?php

namespace Illuminate\Queue\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Cache\Repository as Cache;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
use Illuminate\Support\InteractsWithTime;

class RestartCommand extends Command
{
    use InteractsWithTime;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'queue:restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restart queue worker daemons after their current job';

    /**
<<<<<<< HEAD
=======
     * The cache store implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new queue restart command.
     *
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @return void
     */
    public function __construct(Cache $cache)
    {
        parent::__construct();

        $this->cache = $cache;
    }

    /**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        $this->laravel['cache']->forever('illuminate:queue:restart', $this->currentTime());
=======
        $this->cache->forever('illuminate:queue:restart', $this->currentTime());
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $this->info('Broadcasting queue restart signal.');
    }
}
