<?php

namespace Illuminate\Support\Facades;

use Illuminate\Contracts\Auth\PasswordBroker;

/**
 * @method static string sendResetLink(array $credentials)
 * @method static mixed reset(array $credentials, \Closure $callback)
 * @method static void validator(\Closure $callback)
 * @method static bool validateNewPassword(array $credentials)
 *
 * @see \Illuminate\Auth\Passwords\PasswordBroker
 */
class Password extends Facade
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT = PasswordBroker::RESET_LINK_SENT;

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = PasswordBroker::PASSWORD_RESET;

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = PasswordBroker::INVALID_USER;

    /**
<<<<<<< HEAD
     * Constant representing an invalid password.
     *
     * @var string
     */
    const INVALID_PASSWORD = PasswordBroker::INVALID_PASSWORD;

    /**
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = PasswordBroker::INVALID_TOKEN;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.password';
    }
}
