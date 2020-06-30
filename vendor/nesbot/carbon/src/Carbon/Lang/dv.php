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
}, 'dv');

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
$months = [
    'ޖެނުއަރީ',
    'ފެބްރުއަރީ',
    'މާރިޗު',
    'އޭޕްރީލު',
    'މޭ',
    'ޖޫން',
    'ޖުލައި',
    'އޯގަސްޓު',
    'ސެޕްޓެމްބަރު',
    'އޮކްޓޯބަރު',
    'ނޮވެމްބަރު',
    'ޑިސެމްބަރު',
];

$weekdays = [
    'އާދިއްތަ',
    'ހޯމަ',
    'އަންގާރަ',
    'ބުދަ',
    'ބުރާސްފަތި',
    'ހުކުރު',
    'ހޮނިހިރު',
];

/*
 * Authors:
 * - Josh Soref
 * - Jawish Hameed
 */
return [
    'year' => ':count '.'އަހަރު',
<<<<<<< HEAD
    'a_year' => '{1}'.'އަހަރެއް'.'|:count '.'އަހަރު',
    'month' => ':count '.'މަސް',
    'a_month' => '{1}'.'މަހެއް'.'|:count '.'މަސް',
    'week' => ':count '.'ހަފްތާ',
    'a_week' => '{1}'.'ސިކުންތުކޮޅެއް'.'|:count '.'ހަފްތާ',
    'day' => ':count '.'ދުވަސް',
    'a_day' => '{1}'.'ދުވަހެއް'.'|:count '.'ދުވަސް',
    'hour' => ':count '.'ގަޑިއިރު',
    'a_hour' => '{1}'.'ގަޑިއިރެއް'.'|:count '.'ގަޑިއިރު',
    'minute' => ':count '.'މިނިޓު',
    'a_minute' => '{1}'.'މިނިޓެއް'.'|:count '.'މިނިޓު',
    'second' => ':count '.'ސިކުންތު',
    'a_second' => '{1}'.'ސިކުންތުކޮޅެއް'.'|:count '.'ސިކުންތު',
=======
    'a_year' => 'އަހަރެއް'.'|:count '.'އަހަރު',
    'month' => ':count '.'މަސް',
    'a_month' => 'މަހެއް'.'|:count '.'މަސް',
    'week' => ':count '.'ހަފްތާ',
    'a_week' => 'ސިކުންތުކޮޅެއް'.'|:count '.'ހަފްތާ',
    'day' => ':count '.'ދުވަސް',
    'a_day' => 'ދުވަހެއް'.'|:count '.'ދުވަސް',
    'hour' => ':count '.'ގަޑިއިރު',
    'a_hour' => 'ގަޑިއިރެއް'.'|:count '.'ގަޑިއިރު',
    'minute' => ':count '.'މިނިޓު',
    'a_minute' => 'މިނިޓެއް'.'|:count '.'މިނިޓު',
    'second' => ':count '.'ސިކުންތު',
    'a_second' => 'ސިކުންތުކޮޅެއް'.'|:count '.'ސިކުންތު',
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    'ago' => 'ކުރިން :time',
    'from_now' => 'ތެރޭގައި :time',
    'after' => ':time ފަހުން',
    'before' => ':time ކުރި',
    'diff_yesterday' => 'އިއްޔެ',
    'diff_tomorrow' => 'މާދަމާ',
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'D/M/YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[މިއަދު] LT',
        'nextDay' => '[މާދަމާ] LT',
        'nextWeek' => 'dddd LT',
        'lastDay' => '[އިއްޔެ] LT',
        'lastWeek' => '[ފާއިތުވި] dddd LT',
        'sameElse' => 'L',
    ],
    'meridiem' => ['މކ', 'މފ'],
    'months' => $months,
    'months_short' => $months,
    'weekdays' => $weekdays,
    'weekdays_short' => $weekdays,
    'weekdays_min' => ['އާދި', 'ހޯމަ', 'އަން', 'ބުދަ', 'ބުރާ', 'ހުކު', 'ހޮނި'],
    'list' => [', ', ' އަދި '],
    'first_day_of_week' => 0,
    'day_of_first_week_of_year' => 1,
];
