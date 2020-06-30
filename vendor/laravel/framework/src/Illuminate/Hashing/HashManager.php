<?php

namespace Illuminate\Hashing;

<<<<<<< HEAD
use Illuminate\Support\Manager;
use Illuminate\Contracts\Hashing\Hasher;
=======
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Manager;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class HashManager extends Manager implements Hasher
{
    /**
     * Create an instance of the Bcrypt hash Driver.
     *
     * @return \Illuminate\Hashing\BcryptHasher
     */
    public function createBcryptDriver()
    {
<<<<<<< HEAD
        return new BcryptHasher($this->app['config']['hashing.bcrypt'] ?? []);
=======
        return new BcryptHasher($this->config->get('hashing.bcrypt') ?? []);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Create an instance of the Argon2i hash Driver.
     *
     * @return \Illuminate\Hashing\ArgonHasher
     */
    public function createArgonDriver()
    {
<<<<<<< HEAD
        return new ArgonHasher($this->app['config']['hashing.argon'] ?? []);
=======
        return new ArgonHasher($this->config->get('hashing.argon') ?? []);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Create an instance of the Argon2id hash Driver.
     *
     * @return \Illuminate\Hashing\Argon2IdHasher
     */
    public function createArgon2idDriver()
    {
<<<<<<< HEAD
        return new Argon2IdHasher($this->app['config']['hashing.argon'] ?? []);
=======
        return new Argon2IdHasher($this->config->get('hashing.argon') ?? []);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Get information about the given hashed value.
     *
     * @param  string  $hashedValue
     * @return array
     */
    public function info($hashedValue)
    {
        return $this->driver()->info($hashedValue);
    }

    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function make($value, array $options = [])
    {
        return $this->driver()->make($value, $options);
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        return $this->driver()->check($value, $hashedValue, $options);
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return $this->driver()->needsRehash($hashedValue, $options);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
<<<<<<< HEAD
        return $this->app['config']['hashing.driver'] ?? 'bcrypt';
=======
        return $this->config->get('hashing.driver', 'bcrypt');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
