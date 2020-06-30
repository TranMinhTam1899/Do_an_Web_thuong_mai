<?php

namespace Ramsey\Uuid;

/**
 * Provides binary math utilities
 */
class BinaryUtils
{
    /**
     * Applies the RFC 4122 variant field to the `clock_seq_hi_and_reserved` field
     *
     * @param $clockSeqHi
     * @return int The high field of the clock sequence multiplexed with the variant
     * @link http://tools.ietf.org/html/rfc4122#section-4.1.1
     */
    public static function applyVariant($clockSeqHi)
    {
        // Set the variant to RFC 4122
        $clockSeqHi = $clockSeqHi & 0x3f;
<<<<<<< HEAD
=======
        $clockSeqHi &= ~(0xc0);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $clockSeqHi |= 0x80;

        return $clockSeqHi;
    }

    /**
     * Applies the RFC 4122 version number to the `time_hi_and_version` field
     *
     * @param string $timeHi
     * @param integer $version
     * @return int The high field of the timestamp multiplexed with the version number
     * @link http://tools.ietf.org/html/rfc4122#section-4.1.3
     */
    public static function applyVersion($timeHi, $version)
    {
        $timeHi = hexdec($timeHi) & 0x0fff;
<<<<<<< HEAD
=======
        $timeHi &= ~(0xf000);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        $timeHi |= $version << 12;

        return $timeHi;
    }
}
