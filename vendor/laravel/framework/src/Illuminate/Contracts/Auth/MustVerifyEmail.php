<?php

namespace Illuminate\Contracts\Auth;

interface MustVerifyEmail
{
    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail();

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified();

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification();
<<<<<<< HEAD
=======

    /**
     * Get the email address that should be used for verification.
     *
     * @return string
     */
    public function getEmailForVerification();
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
}
