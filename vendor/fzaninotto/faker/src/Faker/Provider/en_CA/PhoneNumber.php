<?php

namespace Faker\Provider\en_CA;

<<<<<<< HEAD
class PhoneNumber extends \Faker\Provider\en_US\PhoneNumber
=======
class PhoneNumber extends \Faker\Provider\PhoneNumber
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
{
    protected static $formats = array(
        '%##-###-####',
        '%##.###.####',
        '%## ### ####',
        '(%##) ###-####',
        '1-%##-###-####',
        '1 (%##) ###-####',
        '+1 (%##) ###-####',
        '%##-###-#### x###',
        '(%##) ###-#### x###',
    );
}
