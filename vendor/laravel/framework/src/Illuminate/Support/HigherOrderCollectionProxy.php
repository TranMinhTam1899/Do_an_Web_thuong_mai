<?php

namespace Illuminate\Support;

/**
<<<<<<< HEAD
 * @mixin \Illuminate\Support\Collection
=======
 * @mixin \Illuminate\Support\Enumerable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class HigherOrderCollectionProxy
{
    /**
     * The collection being operated on.
     *
<<<<<<< HEAD
     * @var \Illuminate\Support\Collection
=======
     * @var \Illuminate\Support\Enumerable
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    protected $collection;

    /**
     * The method being proxied.
     *
     * @var string
     */
    protected $method;

    /**
     * Create a new proxy instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Support\Collection  $collection
     * @param  string  $method
     * @return void
     */
    public function __construct(Collection $collection, $method)
=======
     * @param  \Illuminate\Support\Enumerable  $collection
     * @param  string  $method
     * @return void
     */
    public function __construct(Enumerable $collection, $method)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->method = $method;
        $this->collection = $collection;
    }

    /**
     * Proxy accessing an attribute onto the collection items.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->collection->{$this->method}(function ($value) use ($key) {
            return is_array($value) ? $value[$key] : $value->{$key};
        });
    }

    /**
     * Proxy a method call onto the collection items.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->collection->{$this->method}(function ($value) use ($method, $parameters) {
            return $value->{$method}(...$parameters);
        });
    }
}
