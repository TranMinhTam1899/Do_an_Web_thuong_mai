<?php

// autoload_real.php @generated by Composer

<<<<<<< HEAD
class ComposerAutoloaderInit037a89acc55e2d4677ce5f56c51192fb
=======
class ComposerAutoloaderInit36ee941336652bc3eb6f33eeedfd2365
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

<<<<<<< HEAD
    /**
     * @return \Composer\Autoload\ClassLoader
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

<<<<<<< HEAD
        spl_autoload_register(array('ComposerAutoloaderInit037a89acc55e2d4677ce5f56c51192fb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit037a89acc55e2d4677ce5f56c51192fb', 'loadClassLoader'));
=======
        spl_autoload_register(array('ComposerAutoloaderInit36ee941336652bc3eb6f33eeedfd2365', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit36ee941336652bc3eb6f33eeedfd2365', 'loadClassLoader'));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require_once __DIR__ . '/autoload_static.php';

<<<<<<< HEAD
            call_user_func(\Composer\Autoload\ComposerStaticInit037a89acc55e2d4677ce5f56c51192fb::getInitializer($loader));
=======
            call_user_func(\Composer\Autoload\ComposerStaticInit36ee941336652bc3eb6f33eeedfd2365::getInitializer($loader));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->register(true);

        if ($useStaticLoader) {
<<<<<<< HEAD
            $includeFiles = Composer\Autoload\ComposerStaticInit037a89acc55e2d4677ce5f56c51192fb::$files;
=======
            $includeFiles = Composer\Autoload\ComposerStaticInit36ee941336652bc3eb6f33eeedfd2365::$files;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
<<<<<<< HEAD
            composerRequire037a89acc55e2d4677ce5f56c51192fb($fileIdentifier, $file);
=======
            composerRequire36ee941336652bc3eb6f33eeedfd2365($fileIdentifier, $file);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        return $loader;
    }
}

<<<<<<< HEAD
function composerRequire037a89acc55e2d4677ce5f56c51192fb($fileIdentifier, $file)
=======
function composerRequire36ee941336652bc3eb6f33eeedfd2365($fileIdentifier, $file)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        require $file;

        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}
