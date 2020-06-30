<?php

namespace Illuminate\Support\Facades;

/**
<<<<<<< HEAD
 * @method static mixed trans(string $key, array $replace = [], string $locale = null)
 * @method static string transChoice(string $key, int|array|\Countable $number, array $replace = [], string $locale = null)
 * @method static string getLocale()
 * @method static void setLocale(string $locale)
 * @method static string|array|null get(string $key, array $replace = [], string $locale = null, bool $fallback = true)
=======
 * @method static mixed get(string $key, array $replace = [], string $locale = null, bool $fallback = true)
 * @method static string choice(string $key, \Countable|int|array $number, array $replace = [], string $locale = null)
 * @method static string getLocale()
 * @method static void setLocale(string $locale)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 *
 * @see \Illuminate\Translation\Translator
 */
class Lang extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'translator';
    }
}
