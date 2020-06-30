<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\Configurator;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
<<<<<<< HEAD
use Symfony\Component\Routing\RouteCompiler;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ImportConfigurator
{
    use Traits\RouteTrait;

    private $parent;

    public function __construct(RouteCollection $parent, RouteCollection $route)
    {
        $this->parent = $parent;
        $this->route = $route;
    }

    public function __destruct()
    {
        $this->parent->addCollection($this->route);
    }

    /**
     * Sets the prefix to add to the path of all child routes.
     *
     * @param string|array $prefix the prefix, or the localized prefixes
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function prefix($prefix, bool $trailingSlashOnRoot = true): self
=======
    final public function prefix($prefix, bool $trailingSlashOnRoot = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        if (!\is_array($prefix)) {
            $this->route->addPrefix($prefix);
            if (!$trailingSlashOnRoot) {
                $rootPath = (new Route(trim(trim($prefix), '/').'/'))->getPath();
                foreach ($this->route->all() as $route) {
                    if ($route->getPath() === $rootPath) {
                        $route->setPath(rtrim($rootPath, '/'));
                    }
                }
            }
        } else {
            foreach ($prefix as $locale => $localePrefix) {
                $prefix[$locale] = trim(trim($localePrefix), '/');
            }
            foreach ($this->route->all() as $name => $route) {
                if (null === $locale = $route->getDefault('_locale')) {
                    $this->route->remove($name);
                    foreach ($prefix as $locale => $localePrefix) {
                        $localizedRoute = clone $route;
                        $localizedRoute->setDefault('_locale', $locale);
<<<<<<< HEAD
                        $localizedRoute->setRequirement('_locale', preg_quote($locale, RouteCompiler::REGEX_DELIMITER));
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        $localizedRoute->setDefault('_canonical_route', $name);
                        $localizedRoute->setPath($localePrefix.(!$trailingSlashOnRoot && '/' === $route->getPath() ? '' : $route->getPath()));
                        $this->route->add($name.'.'.$locale, $localizedRoute);
                    }
                } elseif (!isset($prefix[$locale])) {
                    throw new \InvalidArgumentException(sprintf('Route "%s" with locale "%s" is missing a corresponding prefix in its parent collection.', $name, $locale));
                } else {
                    $route->setPath($prefix[$locale].(!$trailingSlashOnRoot && '/' === $route->getPath() ? '' : $route->getPath()));
                    $this->route->add($name, $route);
                }
            }
        }

        return $this;
    }

    /**
     * Sets the prefix to add to the name of all child routes.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function namePrefix(string $namePrefix): self
=======
    final public function namePrefix(string $namePrefix)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addNamePrefix($namePrefix);

        return $this;
    }
}
