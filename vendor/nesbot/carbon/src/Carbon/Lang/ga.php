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
 * Thanks to André Silva : https://github.com/askpt
 */

return [
    'year' => ':count bliain',
    'a_year' => '{1}bliain|:count bliain',
    'y' => ':countb',
    'month' => ':count mí',
    'a_month' => '{1}mí|:count mí',
    'm' => ':countm',
    'week' => ':count sheachtain',
    'a_week' => '{1}sheachtain|:count sheachtain',
    'w' => ':countsh',
    'day' => ':count lá',
    'a_day' => '{1}lá|:count lá',
    'd' => ':countl',
    'hour' => ':count uair an chloig',
    'a_hour' => '{1}uair an chloig|:count uair an chloig',
    'h' => ':countu',
    'minute' => ':count nóiméad',
    'a_minute' => '{1}nóiméad|:count nóiméad',
    'min' => ':countn',
    'second' => ':count soicind',
    'a_second' => '{1}cúpla soicind|:count soicind',
=======
/**
 * Thanks to André Silva : https://github.com/askpt
 */
\Symfony\Component\Translation\PluralizationRules::set(function ($number) {
    return $number === 1 ? 0 : 1;
}, 'ga');

return [
    'year' => ':count bliain',
    'a_year' => 'bliain|:count bliain',
    'y' => ':countb',
    'month' => ':count mí',
    'a_month' => 'mí|:count mí',
    'm' => ':countm',
    'week' => ':count sheachtain',
    'a_week' => 'sheachtain|:count sheachtain',
    'w' => ':countsh',
    'day' => ':count lá',
    'a_day' => 'lá|:count lá',
    'd' => ':countl',
    'hour' => ':count uair an chloig',
    'a_hour' => 'uair an chloig|:count uair an chloig',
    'h' => ':countu',
    'minute' => ':count nóiméad',
    'a_minute' => 'nóiméad|:count nóiméad',
    'min' => ':countn',
    'second' => ':count soicind',
    'a_second' => 'cúpla soicind|:count soicind',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    's' => ':countso',
    'ago' => ':time ó shin',
    'from_now' => 'i :time',
    'after' => ':time tar éis',
    'before' => ':time roimh',
<<<<<<< HEAD
    'diff_now' => 'anois',
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    'diff_yesterday' => 'inné',
    'diff_tomorrow' => 'amárach',
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'DD/MM/YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd, D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[Inniu ag] LT',
        'nextDay' => '[Amárach ag] LT',
        'nextWeek' => 'dddd [ag] LT',
        'lastDay' => '[Inné aig] LT',
        'lastWeek' => 'dddd [seo caite] [ag] LT',
        'sameElse' => 'L',
    ],
    'months' => ['Eanáir', 'Feabhra', 'Márta', 'Aibreán', 'Bealtaine', 'Méitheamh', 'Iúil', 'Lúnasa', 'Meán Fómhair', 'Deaireadh Fómhair', 'Samhain', 'Nollaig'],
    'months_short' => ['Eaná', 'Feab', 'Márt', 'Aibr', 'Beal', 'Méit', 'Iúil', 'Lúna', 'Meán', 'Deai', 'Samh', 'Noll'],
    'weekdays' => ['Dé Domhnaigh', 'Dé Luain', 'Dé Máirt', 'Dé Céadaoin', 'Déardaoin', 'Dé hAoine', 'Dé Satharn'],
    'weekdays_short' => ['Dom', 'Lua', 'Mái', 'Céa', 'Déa', 'hAo', 'Sat'],
    'weekdays_min' => ['Do', 'Lu', 'Má', 'Ce', 'Dé', 'hA', 'Sa'],
    'ordinal' => function ($number) {
        return $number.($number === 1 ? 'd' : ($number % 10 === 2 ? 'na' : 'mh'));
    },
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,
    'list' => [', ', ' agus '],
    'meridiem' => ['r.n.', 'i.n.'],
];
