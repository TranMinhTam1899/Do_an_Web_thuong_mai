<?php

/*
 * Copyright 2012 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PhpOption;

use ArrayIterator;

<<<<<<< HEAD
/**
 * @template T
 *
 * @extends Option<T>
 */
final class Some extends Option
{
    /** @var T */
    private $value;

    /**
     * @param T $value
     */
=======
final class Some extends Option
{
    private $value;

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public function __construct($value)
    {
        $this->value = $value;
    }

<<<<<<< HEAD
    /**
     * @template U
     *
     * @param U $value
     *
     * @return Some<U>
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public static function create($value)
    {
        return new self($value);
    }

    public function isDefined()
    {
        return true;
    }

    public function isEmpty()
    {
        return false;
    }

    public function get()
    {
        return $this->value;
    }

    public function getOrElse($default)
    {
        return $this->value;
    }

    public function getOrCall($callable)
    {
        return $this->value;
    }

    public function getOrThrow(\Exception $ex)
    {
        return $this->value;
    }

    public function orElse(Option $else)
    {
        return $this;
    }

<<<<<<< HEAD
    public function ifDefined($callable)
    {
        $callable($this->value);
=======
    /**
     * @deprecated Use forAll() instead.
     */
    public function ifDefined($callable)
    {
        call_user_func($callable, $this->value);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function forAll($callable)
    {
<<<<<<< HEAD
        $callable($this->value);
=======
        call_user_func($callable, $this->value);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        return $this;
    }

    public function map($callable)
    {
<<<<<<< HEAD
        return new self($callable($this->value));
=======
        return new self(call_user_func($callable, $this->value));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function flatMap($callable)
    {
<<<<<<< HEAD
        $rs = $callable($this->value);
        if (!$rs instanceof Option) {
=======
        $rs = call_user_func($callable, $this->value);
        if ( ! $rs instanceof Option) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            throw new \RuntimeException('Callables passed to flatMap() must return an Option. Maybe you should use map() instead?');
        }

        return $rs;
    }

    public function filter($callable)
    {
<<<<<<< HEAD
        if (true === $callable($this->value)) {
=======
        if (true === call_user_func($callable, $this->value)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            return $this;
        }

        return None::create();
    }

    public function filterNot($callable)
    {
<<<<<<< HEAD
        if (false === $callable($this->value)) {
=======
        if (false === call_user_func($callable, $this->value)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            return $this;
        }

        return None::create();
    }

    public function select($value)
    {
        if ($this->value === $value) {
            return $this;
        }

        return None::create();
    }

    public function reject($value)
    {
        if ($this->value === $value) {
            return None::create();
        }

        return $this;
    }

    public function getIterator()
    {
<<<<<<< HEAD
        return new ArrayIterator([$this->value]);
=======
        return new ArrayIterator(array($this->value));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function foldLeft($initialValue, $callable)
    {
<<<<<<< HEAD
        return $callable($initialValue, $this->value);
=======
        return call_user_func($callable, $initialValue, $this->value);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    public function foldRight($initialValue, $callable)
    {
<<<<<<< HEAD
        return $callable($this->value, $initialValue);
=======
        return call_user_func($callable, $this->value, $initialValue);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
