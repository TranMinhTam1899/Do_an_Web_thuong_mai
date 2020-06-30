<?php

namespace Illuminate\Routing;

use Illuminate\Http\RedirectResponse;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
use Illuminate\Support\Str;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

class RedirectController extends Controller
{
    /**
     * Invoke the controller method.
     *
<<<<<<< HEAD
     * @param  array  $args
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(...$args)
    {
        [$destination, $status] = array_slice($args, -2);

        return new RedirectResponse($destination, $status);
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Routing\UrlGenerator  $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, UrlGenerator $url)
    {
        $parameters = collect($request->route()->parameters());

        $status = $parameters->pop();

        $destination = $parameters->pop();

        $route = (new Route('GET', $destination, [
            'as' => 'laravel_route_redirect_destination',
        ]))->bind($request);

        $parameters = $parameters->only(
            $route->getCompiled()->getPathVariables()
        )->toArray();

        $url = $url->toRoute($route, $parameters, false);

        if (! Str::startsWith($destination, '/') && Str::startsWith($url, '/')) {
            $url = Str::after($url, '/');
        }

        return new RedirectResponse($url, $status);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
