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
}, 'tet');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

/*
 * Authors:
 * - Joshua Brooks
 * - François B
 */
return [
    'year' => 'tinan :count',
<<<<<<< HEAD
    'a_year' => '{1}tinan ida|tinan :count',
    'month' => 'fulan :count',
    'a_month' => '{1}fulan ida|fulan :count',
    'week' => 'semana :count',
    'a_week' => '{1}semana ida|semana :count',
    'day' => 'loron :count',
    'a_day' => '{1}loron ida|loron :count',
    'hour' => 'oras :count',
    'a_hour' => '{1}oras ida|oras :count',
    'minute' => 'minutu :count',
    'a_minute' => '{1}minutu ida|minutu :count',
    'second' => 'segundu :count',
    'a_second' => '{1}segundu balun|segundu :count',
=======
    'a_year' => 'tinan ida|tinan :count',
    'month' => 'fulan :count',
    'a_month' => 'fulan ida|fulan :count',
    'week' => 'semana :count',
    'a_week' => 'semana ida|semana :count',
    'day' => 'loron :count',
    'a_day' => 'loron ida|loron :count',
    'hour' => 'oras :count',
    'a_hour' => 'oras ida|oras :count',
    'minute' => 'minutu :count',
    'a_minute' => 'minutu ida|minutu :count',
    'second' => 'segundu :count',
    'a_second' => 'segundu balun|segundu :count',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    'ago' => ':time liuba',
    'from_now' => 'iha :time',
    'diff_yesterday' => 'Horiseik',
    'diff_tomorrow' => 'Aban',
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'DD/MM/YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd, D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[Ohin iha] LT',
        'nextDay' => '[Aban iha] LT',
        'nextWeek' => 'dddd [iha] LT',
        'lastDay' => '[Horiseik iha] LT',
        'lastWeek' => 'dddd [semana kotuk] [iha] LT',
        'sameElse' => 'L',
    ],
    'ordinal' => ':numberº',
    'months' => ['Janeiru', 'Fevereiru', 'Marsu', 'Abril', 'Maiu', 'Juñu', 'Jullu', 'Agustu', 'Setembru', 'Outubru', 'Novembru', 'Dezembru'],
    'months_short' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    'weekdays' => ['Domingu', 'Segunda', 'Tersa', 'Kuarta', 'Kinta', 'Sesta', 'Sabadu'],
    'weekdays_short' => ['Dom', 'Seg', 'Ters', 'Kua', 'Kint', 'Sest', 'Sab'],
    'weekdays_min' => ['Do', 'Seg', 'Te', 'Ku', 'Ki', 'Ses', 'Sa'],
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,
];
