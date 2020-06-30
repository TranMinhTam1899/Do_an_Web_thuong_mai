<?php

namespace Illuminate\Database\Events;

<<<<<<< HEAD
use Illuminate\Database\Migrations\Migration;
use Illuminate\Contracts\Database\Events\MigrationEvent as MigrationEventContract;
=======
use Illuminate\Contracts\Database\Events\MigrationEvent as MigrationEventContract;
use Illuminate\Database\Migrations\Migration;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

abstract class MigrationEvent implements MigrationEventContract
{
    /**
     * An migration instance.
     *
     * @var \Illuminate\Database\Migrations\Migration
     */
    public $migration;

    /**
     * The migration method that was called.
     *
     * @var string
     */
    public $method;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Database\Migrations\Migration  $migration
     * @param  string  $method
     * @return void
     */
    public function __construct(Migration $migration, $method)
    {
        $this->method = $method;
        $this->migration = $migration;
    }
}
