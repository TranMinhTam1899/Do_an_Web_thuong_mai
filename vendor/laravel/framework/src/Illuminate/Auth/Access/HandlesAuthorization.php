<?php

namespace Illuminate\Auth\Access;

trait HandlesAuthorization
{
    /**
     * Create a new access response.
     *
     * @param  string|null  $message
<<<<<<< HEAD
     * @return \Illuminate\Auth\Access\Response
     */
    protected function allow($message = null)
    {
        return new Response($message);
=======
     * @param  mixed        $code
     * @return \Illuminate\Auth\Access\Response
     */
    protected function allow($message = null, $code = null)
    {
        return Response::allow($message, $code);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Throws an unauthorized exception.
     *
     * @param  string  $message
<<<<<<< HEAD
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function deny($message = 'This action is unauthorized.')
    {
        throw new AuthorizationException($message);
=======
     * @param  mixed|null  $code
     * @return \Illuminate\Auth\Access\Response
     */
    protected function deny($message = null, $code = null)
    {
        return Response::deny($message, $code);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
