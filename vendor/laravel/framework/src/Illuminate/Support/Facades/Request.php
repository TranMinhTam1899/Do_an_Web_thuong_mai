<?php

namespace Illuminate\Support\Facades;

/**
<<<<<<< HEAD
=======
 * @method static bool matchesType(string $actual, string $type)
 * @method static bool isJson()
 * @method static bool expectsJson()
 * @method static bool wantsJson()
 * @method static bool accepts(string|array $contentTypes)
 * @method static bool prefers(string|array $contentTypes)
 * @method static bool acceptsAnyContentType()
 * @method static bool acceptsJson()
 * @method static bool acceptsHtml()
 * @method static string format($default = 'html')
 * @method static string|array old(string|null $key = null, string|array|null $default = null)
 * @method static void flash()
 * @method static void flashOnly(array|mixed $keys)
 * @method static void flashExcept(array|mixed $keys)
 * @method static void flush()
 * @method static string|array|null server(string|null $key = null, string|array|null $default = null)
 * @method static bool hasHeader(string $key)
 * @method static string|array|null header(string|null $key = null, string|array|null $default = null)
 * @method static string|null bearerToken()
 * @method static bool exists(string|array $key)
 * @method static bool has(string|array $key)
 * @method static bool hasAny(string|array $key)
 * @method static bool filled(string|array $key)
 * @method static bool anyFilled(string|array $key)
 * @method static array keys()
 * @method static array all(array|mixed|null $keys = null)
 * @method static string|array|null input(string|null $key = null, string|array|null $default = null)
 * @method static array only(array|mixed $keys)
 * @method static array except(array|mixed $keys)
 * @method static string|array|null query(string|null $key = null, string|array|null $default = null)
 * @method static string|array|null post(string|null $key = null, string|array|null $default = null)
 * @method static bool hasCookie(string $key)
 * @method static string|array|null cookie(string|null $key = null, string|array|null $default = null)
 * @method static array allFiles()
 * @method static bool hasFile(string $key)
 * @method static \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null file(string|null $key = null, mixed $default = null)
 * @method static \Illuminate\Http\Request capture()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @method static \Illuminate\Http\Request instance()
 * @method static string method()
 * @method static string root()
 * @method static string url()
 * @method static string fullUrl()
 * @method static string fullUrlWithQuery(array $query)
 * @method static string path()
 * @method static string decodedPath()
 * @method static string|null segment(int $index, string|null $default = null)
 * @method static array segments()
<<<<<<< HEAD
 * @method static bool is(...$patterns)
 * @method static bool routeIs(...$patterns)
 * @method static bool fullUrlIs(...$patterns)
 * @method static bool ajax()
 * @method static bool pjax()
 * @method static bool secure()
 * @method static string ip()
=======
 * @method static bool is(mixed ...$patterns)
 * @method static bool routeIs(mixed ...$patterns)
 * @method static bool fullUrlIs(mixed ...$patterns)
 * @method static bool ajax()
 * @method static bool pjax()
 * @method static bool prefetch()
 * @method static bool secure()
 * @method static string|null ip()
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @method static array ips()
 * @method static string userAgent()
 * @method static \Illuminate\Http\Request merge(array $input)
 * @method static \Illuminate\Http\Request replace(array $input)
<<<<<<< HEAD
 * @method static \Symfony\Component\HttpFoundation\ParameterBag|mixed json(string $key = null, $default = null)
=======
 * @method static \Symfony\Component\HttpFoundation\ParameterBag|mixed json(string|null $key = null, mixed $default = null)
 * @method static \Illuminate\Http\Request createFrom(\Illuminate\Http\Request $from, \Illuminate\Http\Request|null $to = null)
 * @method static \Illuminate\Http\Request createFromBase(\Symfony\Component\HttpFoundation\Request $request)
 * @method static \Illuminate\Http\Request duplicate(array|null $query = null, array|null $request = null, array|null $attributes = null, array|null $cookies = null, array|null $files = null, array|null $server = null)
 * @method static mixed filterFiles(mixed $files)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @method static \Illuminate\Session\Store session()
 * @method static \Illuminate\Session\Store|null getSession()
 * @method static void setLaravelSession(\Illuminate\Contracts\Session\Session $session)
 * @method static mixed user(string|null $guard = null)
<<<<<<< HEAD
 * @method static \Illuminate\Routing\Route|object|string route(string|null $param = null)
=======
 * @method static \Illuminate\Routing\Route|object|string route(string|null $param = null, string|null $default = null)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @method static string fingerprint()
 * @method static \Illuminate\Http\Request setJson(\Symfony\Component\HttpFoundation\ParameterBag $json)
 * @method static \Closure getUserResolver()
 * @method static \Illuminate\Http\Request setUserResolver(\Closure $callback)
 * @method static \Closure getRouteResolver()
 * @method static \Illuminate\Http\Request setRouteResolver(\Closure $callback)
 * @method static array toArray()
 * @method static bool offsetExists(string $offset)
 * @method static mixed offsetGet(string $offset)
<<<<<<< HEAD
 * @method static void offsetSet(string $offset, $value)
=======
 * @method static void offsetSet(string $offset, mixed $value)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * @method static void offsetUnset(string $offset)
 *
 * @see \Illuminate\Http\Request
 */
class Request extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'request';
    }
}
