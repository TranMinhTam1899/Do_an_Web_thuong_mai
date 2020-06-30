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
=======
\Symfony\Component\Translation\PluralizationRules::set(function ($number) {
    return $number === 1 ? 0 : 1;
}, 'tlh');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * Authors:
 * - François B
 * - Serhan Apaydın
 * - Dominika
 */
return [
<<<<<<< HEAD
    'year' => '{1}wa’ DIS|:count DIS',
    'month' => '{1}wa’ jar|:count jar',
    'week' => '{1}wa’ hogh|:count hogh',
    'day' => '{1}wa’ jaj|:count jaj',
    'hour' => '{1}wa’ rep|:count rep',
    'minute' => '{1}wa’ tup|:count tup',
    'second' => '{1}puS lup|:count lup',
=======
    'year' => 'wa’ DIS|:count DIS',
    'month' => 'wa’ jar|:count jar',
    'week' => 'wa’ hogh|:count hogh',
    'day' => 'wa’ jaj|:count jaj',
    'hour' => 'wa’ rep|:count rep',
    'minute' => 'wa’ tup|:count tup',
    'second' => 'puS lup|:count lup',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    'ago' => function ($time) {
        $output = strtr($time, [
            'jaj' => 'Hu’',
            'jar' => 'wen',
            'DIS' => 'ben',
        ]);

        return $output === $time ? "$time ret" : $output;
    },
    'from_now' => function ($time) {
        $output = strtr($time, [
            'jaj' => 'leS',
            'jar' => 'waQ',
            'DIS' => 'nem',
        ]);

        return $output === $time ? "$time pIq" : $output;
    },
    'diff_yesterday' => 'wa’Hu’',
    'diff_tomorrow' => 'wa’leS',
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'DD.MM.YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd, D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[DaHjaj] LT',
        'nextDay' => '[wa’leS] LT',
        'nextWeek' => 'LLL',
        'lastDay' => '[wa’Hu’] LT',
        'lastWeek' => 'LLL',
        'sameElse' => 'L',
    ],
    'ordinal' => ':number.',
    'months' => ['tera’ jar wa’', 'tera’ jar cha’', 'tera’ jar wej', 'tera’ jar loS', 'tera’ jar vagh', 'tera’ jar jav', 'tera’ jar Soch', 'tera’ jar chorgh', 'tera’ jar Hut', 'tera’ jar wa’maH', 'tera’ jar wa’maH wa’', 'tera’ jar wa’maH cha’'],
    'months_short' => ['jar wa’', 'jar cha’', 'jar wej', 'jar loS', 'jar vagh', 'jar jav', 'jar Soch', 'jar chorgh', 'jar Hut', 'jar wa’maH', 'jar wa’maH wa’', 'jar wa’maH cha’'],
    'weekdays' => ['lojmItjaj', 'DaSjaj', 'povjaj', 'ghItlhjaj', 'loghjaj', 'buqjaj', 'ghInjaj'],
    'weekdays_short' => ['lojmItjaj', 'DaSjaj', 'povjaj', 'ghItlhjaj', 'loghjaj', 'buqjaj', 'ghInjaj'],
    'weekdays_min' => ['lojmItjaj', 'DaSjaj', 'povjaj', 'ghItlhjaj', 'loghjaj', 'buqjaj', 'ghInjaj'],
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,
    'list' => [', ', ' ’ej '],
];
