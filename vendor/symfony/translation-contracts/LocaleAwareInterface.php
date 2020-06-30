<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Contracts\Translation;

interface LocaleAwareInterface
{
    /**
     * Sets the current locale.
     *
     * @param string $locale The locale
     *
     * @throws \InvalidArgumentException If the locale contains invalid characters
     */
<<<<<<< HEAD
    public function setLocale(string $locale);
=======
    public function setLocale($locale);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Returns the current locale.
     *
     * @return string The locale
     */
    public function getLocale();
}
