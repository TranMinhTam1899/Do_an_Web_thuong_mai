<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\Configurator\Traits;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

trait RouteTrait
{
    /**
     * @var RouteCollection|Route
     */
    private $route;

    /**
     * Adds defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function defaults(array $defaults): self
=======
    final public function defaults(array $defaults)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addDefaults($defaults);

        return $this;
    }

    /**
     * Adds requirements.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function requirements(array $requirements): self
=======
    final public function requirements(array $requirements)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addRequirements($requirements);

        return $this;
    }

    /**
     * Adds options.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function options(array $options): self
=======
    final public function options(array $options)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addOptions($options);

        return $this;
    }

    /**
     * Whether paths should accept utf8 encoding.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function utf8(bool $utf8 = true): self
=======
    final public function utf8(bool $utf8 = true)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addOptions(['utf8' => $utf8]);

        return $this;
    }

    /**
     * Sets the condition.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function condition(string $condition): self
=======
    final public function condition(string $condition)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->setCondition($condition);

        return $this;
    }

    /**
     * Sets the pattern for the host.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function host(string $pattern): self
=======
    final public function host(string $pattern)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->setHost($pattern);

        return $this;
    }

    /**
     * Sets the schemes (e.g. 'https') this route is restricted to.
     * So an empty array means that any scheme is allowed.
     *
     * @param string[] $schemes
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function schemes(array $schemes): self
=======
    final public function schemes(array $schemes)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->setSchemes($schemes);

        return $this;
    }

    /**
     * Sets the HTTP methods (e.g. 'POST') this route is restricted to.
     * So an empty array means that any method is allowed.
     *
     * @param string[] $methods
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function methods(array $methods): self
=======
    final public function methods(array $methods)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->setMethods($methods);

        return $this;
    }

    /**
     * Adds the "_controller" entry to defaults.
     *
     * @param callable|string $controller a callable or parseable pseudo-callable
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function controller($controller): self
=======
    final public function controller($controller)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addDefaults(['_controller' => $controller]);

        return $this;
    }

    /**
     * Adds the "_locale" entry to defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function locale(string $locale): self
=======
    final public function locale(string $locale)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addDefaults(['_locale' => $locale]);

        return $this;
    }

    /**
     * Adds the "_format" entry to defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function format(string $format): self
=======
    final public function format(string $format)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    {
        $this->route->addDefaults(['_format' => $format]);

        return $this;
    }
}
