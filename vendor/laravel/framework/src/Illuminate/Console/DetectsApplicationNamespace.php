<?php

namespace Illuminate\Console;

use Illuminate\Container\Container;

<<<<<<< HEAD
=======
/**
 * @deprecated Usage of this trait is deprecated and it will be removed in Laravel 7.0.
 */
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
trait DetectsApplicationNamespace
{
    /**
     * Get the application namespace.
     *
     * @return string
     */
    protected function getAppNamespace()
    {
        return Container::getInstance()->getNamespace();
    }
}
