<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
/*
=======
/**
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 * Authors:
 * - Josh Soref
 * - François B
 * - shaishavgandhi05
 * - Serhan Apaydın
 * - JD Isaacks
 * - Glavić
 * - Milos Sakovic
 */
return [
    'year' => ':count godina|:count godine|:count godina',
    'y' => ':count g.',
    'month' => ':count mesec|:count meseca|:count meseci',
    'm' => ':count mj.',
    'week' => ':count nedelja|:count nedelje|:count nedelja',
    'w' => ':count ned.',
    'day' => ':count dan|:count dana|:count dana',
    'd' => ':count d.',
    'hour' => ':count sat|:count sata|:count sati',
    'h' => ':count č.',
<<<<<<< HEAD
    'minute' => ':count minut|:count minuta|:count minuta',
    'min' => ':count min.',
    'second' => ':count sekundu|:count sekunde|:count sekundi',
=======
    'minute' => ':count minut|:count minuta |:count minuta',
    'min' => ':count min.',
    'second' => ':count sekund|:count sekunde|:count sekunde',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    's' => ':count sek.',
    'ago' => 'pre :time',
    'from_now' => 'za :time',
    'after' => 'nakon :time',
    'before' => 'pre :time',

    'year_from_now' => ':count godinu|:count godine|:count godina',
    'year_ago' => ':count godinu|:count godine|:count godina',
    'week_from_now' => ':count nedelju|:count nedelje|:count nedelja',
    'week_ago' => ':count nedelju|:count nedelje|:count nedelja',

    'diff_now' => 'upravo sada',
    'diff_yesterday' => 'juče',
    'diff_tomorrow' => 'sutra',
    'diff_before_yesterday' => 'prekjuče',
    'diff_after_tomorrow' => 'preksutra',
    'formats' => [
        'LT' => 'H:mm',
        'LTS' => 'H:mm:ss',
        'L' => 'DD.MM.YYYY',
        'LL' => 'D. MMMM YYYY',
        'LLL' => 'D. MMMM YYYY H:mm',
        'LLLL' => 'dddd, D. MMMM YYYY H:mm',
    ],
    'calendar' => [
        'sameDay' => '[danas u] LT',
        'nextDay' => '[sutra u] LT',
        'nextWeek' => function (\Carbon\CarbonInterface $date) {
            switch ($date->dayOfWeek) {
                case 0:
<<<<<<< HEAD
                    return '[u nedelju u] LT';
                case 3:
                    return '[u sredu u] LT';
                case 6:
                    return '[u subotu u] LT';
                default:
                    return '[u] dddd [u] LT';
=======
                    return '[у недељу у] LT';
                case 3:
                    return '[у среду у] LT';
                case 6:
                    return '[у суботу у] LT';
                default:
                    return '[у] dddd [у] LT';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        },
        'lastDay' => '[juče u] LT',
        'lastWeek' => function (\Carbon\CarbonInterface $date) {
            switch ($date->dayOfWeek) {
                case 0:
<<<<<<< HEAD
                    return '[prošle nedelje u] LT';
                case 1:
                    return '[prošlog ponedeljka u] LT';
                case 2:
                    return '[prošlog utorka u] LT';
                case 3:
                    return '[prošle srede u] LT';
                case 4:
                    return '[prošlog četvrtka u] LT';
                case 5:
                    return '[prošlog petka u] LT';
                default:
                    return '[prošle subote u] LT';
=======
                    return '[прошле недеље у] LT';
                case 1:
                    return '[прошлог понедељка у] LT';
                case 2:
                    return '[прошлог уторка у] LT';
                case 3:
                    return '[прошле среде у] LT';
                case 4:
                    return '[прошлог четвртка у] LT';
                case 5:
                    return '[прошлог петка у] LT';
                default:
                    return '[прошле суботе у] LT';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
            }
        },
        'sameElse' => 'L',
    ],
    'ordinal' => ':number.',
    'months' => ['januar', 'februar', 'mart', 'april', 'maj', 'jun', 'jul', 'avgust', 'septembar', 'oktobar', 'novembar', 'decembar'],
    'months_short' => ['jan.', 'feb.', 'mar.', 'apr.', 'maj', 'jun', 'jul', 'avg.', 'sep.', 'okt.', 'nov.', 'dec.'],
    'weekdays' => ['nedelja', 'ponedeljak', 'utorak', 'sreda', 'četvrtak', 'petak', 'subota'],
    'weekdays_short' => ['ned.', 'pon.', 'uto.', 'sre.', 'čet.', 'pet.', 'sub.'],
    'weekdays_min' => ['ne', 'po', 'ut', 'sr', 'če', 'pe', 'su'],
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 1,
    'list' => [', ', ' i '],
<<<<<<< HEAD
=======
    'meridiem' => ['пре подне', 'по подне'],
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
];
