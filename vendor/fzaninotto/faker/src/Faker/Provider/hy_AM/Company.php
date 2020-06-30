<?php

namespace Faker\Provider\hy_AM;

class Company extends \Faker\Provider\Company
{
    protected static $formats = array(
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} եղբայրներ',
    );

    protected static $catchPhraseWords = array(

    );

    protected static $bsWords = array(

    );

    protected static $companySuffix = array('ՍՊԸ','և որդիներ','ՓԲԸ','ԲԲԸ');

    /**
     * @example 'Robust full-range hub'
     */
    public function catchPhrase()
    {
        $result = array();
        foreach (static::$catchPhraseWords as &$word) {
            $result[] = static::randomElement($word);
        }

<<<<<<< HEAD
        return join(' ', $result);
=======
        return join($result, ' ');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * @example 'integrate extensible convergence'
     */
    public function bs()
    {
        $result = array();
        foreach (static::$bsWords as &$word) {
            $result[] = static::randomElement($word);
        }

<<<<<<< HEAD
        return join(' ', $result);
=======
        return join($result, ' ');
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
