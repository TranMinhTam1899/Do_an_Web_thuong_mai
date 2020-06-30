<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

use Symfony\Component\Console\Formatter\OutputFormatter;

/**
 * The Formatter class provides helpers to format messages.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FormatterHelper extends Helper
{
    /**
     * Formats a message within a section.
     *
     * @param string $section The section name
     * @param string $message The message
     * @param string $style   The style to apply to the section
     *
     * @return string The format section
     */
    public function formatSection($section, $message, $style = 'info')
    {
        return sprintf('<%s>[%s]</%s> %s', $style, $section, $style, $message);
    }

    /**
     * Formats a message as a block of text.
     *
     * @param string|array $messages The message to write in the block
     * @param string       $style    The style to apply to the whole block
     * @param bool         $large    Whether to return a large block
     *
     * @return string The formatter message
     */
    public function formatBlock($messages, $style, $large = false)
    {
        if (!\is_array($messages)) {
            $messages = [$messages];
        }

        $len = 0;
        $lines = [];
        foreach ($messages as $message) {
            $message = OutputFormatter::escape($message);
            $lines[] = sprintf($large ? '  %s  ' : ' %s ', $message);
<<<<<<< HEAD
            $len = max(self::strlen($message) + ($large ? 4 : 2), $len);
=======
            $len = max($this->strlen($message) + ($large ? 4 : 2), $len);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }

        $messages = $large ? [str_repeat(' ', $len)] : [];
        for ($i = 0; isset($lines[$i]); ++$i) {
<<<<<<< HEAD
            $messages[] = $lines[$i].str_repeat(' ', $len - self::strlen($lines[$i]));
=======
            $messages[] = $lines[$i].str_repeat(' ', $len - $this->strlen($lines[$i]));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        }
        if ($large) {
            $messages[] = str_repeat(' ', $len);
        }

        for ($i = 0; isset($messages[$i]); ++$i) {
            $messages[$i] = sprintf('<%s>%s</%s>', $style, $messages[$i], $style);
        }

        return implode("\n", $messages);
    }

    /**
     * Truncates a message to the given length.
     *
     * @param string $message
     * @param int    $length
     * @param string $suffix
     *
     * @return string
     */
    public function truncate($message, $length, $suffix = '...')
    {
<<<<<<< HEAD
        $computedLength = $length - self::strlen($suffix);

        if ($computedLength > self::strlen($message)) {
            return $message;
        }

        return self::substr($message, 0, $length).$suffix;
=======
        $computedLength = $length - $this->strlen($suffix);

        if ($computedLength > $this->strlen($message)) {
            return $message;
        }

        if (false === $encoding = mb_detect_encoding($message, null, true)) {
            return substr($message, 0, $length).$suffix;
        }

        return mb_substr($message, 0, $length, $encoding).$suffix;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'formatter';
    }
}
