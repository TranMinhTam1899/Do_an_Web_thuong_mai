<?php

namespace Illuminate\Contracts\Translation;

interface Translator
{
    /**
     * Get the translation for a given key.
     *
     * @param  string  $key
     * @param  array   $replace
     * @param  string|null  $locale
     * @return mixed
     */
<<<<<<< HEAD
    public function trans($key, array $replace = [], $locale = null);
=======
    public function get($key, array $replace = [], $locale = null);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Get a translation according to an integer value.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  int|array|\Countable  $number
=======
     * @param  \Countable|int|array  $number
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @param  array   $replace
     * @param  string|null  $locale
     * @return string
     */
<<<<<<< HEAD
    public function transChoice($key, $number, array $replace = [], $locale = null);
=======
    public function choice($key, $number, array $replace = [], $locale = null);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Get the default locale being used.
     *
     * @return string
     */
    public function getLocale();

    /**
     * Set the default locale.
     *
     * @param  string  $locale
     * @return void
     */
    public function setLocale($locale);
}
