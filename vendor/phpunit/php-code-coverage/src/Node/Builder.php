<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Node;

use SebastianBergmann\CodeCoverage\CodeCoverage;

final class Builder
{
    public function build(CodeCoverage $coverage): Directory
    {
        $files      = $coverage->getData();
        $commonPath = $this->reducePaths($files);
        $root       = new Directory(
            $commonPath,
            null
        );

        $this->addItems(
            $root,
            $this->buildDirectoryStructure($files),
            $coverage->getTests(),
            $coverage->getCacheTokens()
        );

        return $root;
    }

    private function addItems(Directory $root, array $items, array $tests, bool $cacheTokens): void
    {
        foreach ($items as $key => $value) {
<<<<<<< HEAD
            if (\substr($key, -2) == '/f') {
=======
            $key = (string) $key;

            if (\substr($key, -2) === '/f') {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $key = \substr($key, 0, -2);

                if (\file_exists($root->getPath() . \DIRECTORY_SEPARATOR . $key)) {
                    $root->addFile($key, $value, $tests, $cacheTokens);
                }
            } else {
                $child = $root->addDirectory($key);
                $this->addItems($child, $value, $tests, $cacheTokens);
            }
        }
    }

    /**
     * Builds an array representation of the directory structure.
     *
     * For instance,
     *
     * <code>
     * Array
     * (
     *     [Money.php] => Array
     *         (
     *             ...
     *         )
     *
     *     [MoneyBag.php] => Array
     *         (
     *             ...
     *         )
     * )
     * </code>
     *
     * is transformed into
     *
     * <code>
     * Array
     * (
     *     [.] => Array
     *         (
     *             [Money.php] => Array
     *                 (
     *                     ...
     *                 )
     *
     *             [MoneyBag.php] => Array
     *                 (
     *                     ...
     *                 )
     *         )
     * )
     * </code>
     */
    private function buildDirectoryStructure(array $files): array
    {
        $result = [];

        foreach ($files as $path => $file) {
            $path    = \explode(\DIRECTORY_SEPARATOR, $path);
            $pointer = &$result;
            $max     = \count($path);

            for ($i = 0; $i < $max; $i++) {
                $type = '';

<<<<<<< HEAD
                if ($i == ($max - 1)) {
=======
                if ($i === ($max - 1)) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    $type = '/f';
                }

                $pointer = &$pointer[$path[$i] . $type];
            }

            $pointer = $file;
        }

        return $result;
    }

    /**
     * Reduces the paths by cutting the longest common start path.
     *
     * For instance,
     *
     * <code>
     * Array
     * (
     *     [/home/sb/Money/Money.php] => Array
     *         (
     *             ...
     *         )
     *
     *     [/home/sb/Money/MoneyBag.php] => Array
     *         (
     *             ...
     *         )
     * )
     * </code>
     *
     * is reduced to
     *
     * <code>
     * Array
     * (
     *     [Money.php] => Array
     *         (
     *             ...
     *         )
     *
     *     [MoneyBag.php] => Array
     *         (
     *             ...
     *         )
     * )
     * </code>
     */
    private function reducePaths(array &$files): string
    {
        if (empty($files)) {
            return '.';
        }

        $commonPath = '';
        $paths      = \array_keys($files);

        if (\count($files) === 1) {
            $commonPath                  = \dirname($paths[0]) . \DIRECTORY_SEPARATOR;
            $files[\basename($paths[0])] = $files[$paths[0]];

            unset($files[$paths[0]]);

            return $commonPath;
        }

        $max = \count($paths);

        for ($i = 0; $i < $max; $i++) {
            // strip phar:// prefixes
            if (\strpos($paths[$i], 'phar://') === 0) {
                $paths[$i] = \substr($paths[$i], 7);
                $paths[$i] = \str_replace('/', \DIRECTORY_SEPARATOR, $paths[$i]);
            }
            $paths[$i] = \explode(\DIRECTORY_SEPARATOR, $paths[$i]);

            if (empty($paths[$i][0])) {
                $paths[$i][0] = \DIRECTORY_SEPARATOR;
            }
        }

        $done = false;
        $max  = \count($paths);

        while (!$done) {
            for ($i = 0; $i < $max - 1; $i++) {
                if (!isset($paths[$i][0]) ||
                    !isset($paths[$i + 1][0]) ||
<<<<<<< HEAD
                    $paths[$i][0] != $paths[$i + 1][0]) {
=======
                    $paths[$i][0] !== $paths[$i + 1][0]) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    $done = true;

                    break;
                }
            }

            if (!$done) {
                $commonPath .= $paths[0][0];

<<<<<<< HEAD
                if ($paths[0][0] != \DIRECTORY_SEPARATOR) {
=======
                if ($paths[0][0] !== \DIRECTORY_SEPARATOR) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                    $commonPath .= \DIRECTORY_SEPARATOR;
                }

                for ($i = 0; $i < $max; $i++) {
                    \array_shift($paths[$i]);
                }
            }
        }

        $original = \array_keys($files);
        $max      = \count($original);

        for ($i = 0; $i < $max; $i++) {
            $files[\implode(\DIRECTORY_SEPARATOR, $paths[$i])] = $files[$original[$i]];
            unset($files[$original[$i]]);
        }

        \ksort($files);

        return \substr($commonPath, 0, -1);
    }
}
