<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler\Curl;

<<<<<<< HEAD
class Util
{
    private static $retriableErrorCodes = array(
=======
/**
 * This class is marked as internal and it is not under the BC promise of the package.
 *
 * @internal
 */
final class Util
{
    private static $retriableErrorCodes = [
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        CURLE_COULDNT_RESOLVE_HOST,
        CURLE_COULDNT_CONNECT,
        CURLE_HTTP_NOT_FOUND,
        CURLE_READ_ERROR,
        CURLE_OPERATION_TIMEOUTED,
        CURLE_HTTP_POST_ERROR,
        CURLE_SSL_CONNECT_ERROR,
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

    /**
     * Executes a CURL request with optional retries and exception on failure
     *
<<<<<<< HEAD
     * @param  resource          $ch curl handler
     * @throws \RuntimeException
     */
    public static function execute($ch, $retries = 5, $closeAfterDone = true)
    {
        while ($retries--) {
            if (curl_exec($ch) === false) {
=======
     * @param  resource    $ch             curl handler
     * @param  int         $retries
     * @param  bool        $closeAfterDone
     * @return bool|string @see curl_exec
     */
    public static function execute($ch, int $retries = 5, bool $closeAfterDone = true)
    {
        while ($retries--) {
            $curlResponse = curl_exec($ch);
            if ($curlResponse === false) {
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                $curlErrno = curl_errno($ch);

                if (false === in_array($curlErrno, self::$retriableErrorCodes, true) || !$retries) {
                    $curlError = curl_error($ch);

                    if ($closeAfterDone) {
                        curl_close($ch);
                    }

<<<<<<< HEAD
                    throw new \RuntimeException(sprintf('Curl error (code %s): %s', $curlErrno, $curlError));
=======
                    throw new \RuntimeException(sprintf('Curl error (code %d): %s', $curlErrno, $curlError));
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                }

                continue;
            }

            if ($closeAfterDone) {
                curl_close($ch);
            }
<<<<<<< HEAD
            break;
        }
=======

            return $curlResponse;
        }

        return false;
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
