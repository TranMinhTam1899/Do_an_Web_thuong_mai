Translation Component
=====================

The Translation component provides tools to internationalize your application.

<<<<<<< HEAD
Getting Started
---------------

```
$ composer require symfony/translation
```

```php
use Symfony\Component\Translation\Translator;

$translator = new Translator('fr_FR');
$translator->addResource('array', [
    'Hello World!' => 'Bonjour !',
], 'fr_FR');

echo $translator->trans('Hello World!'); // outputs « Bonjour ! »
```

Resources
---------

  * [Documentation](https://symfony.com/doc/current/translation.html)
=======
Resources
---------

  * [Documentation](https://symfony.com/doc/current/components/translation/index.html)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
  * [Contributing](https://symfony.com/doc/current/contributing/index.html)
  * [Report issues](https://github.com/symfony/symfony/issues) and
    [send Pull Requests](https://github.com/symfony/symfony/pulls)
    in the [main Symfony repository](https://github.com/symfony/symfony)
