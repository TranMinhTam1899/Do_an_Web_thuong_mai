<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Casts GMP objects to array representation.
 *
 * @author Hamza Amrouche <hamza.simperfit@gmail.com>
 * @author Nicolas Grekas <p@tchwork.com>
<<<<<<< HEAD
 *
 * @final since Symfony 4.4
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
 */
class GmpCaster
{
    public static function castGmp(\GMP $gmp, array $a, Stub $stub, $isNested, $filter): array
    {
        $a[Caster::PREFIX_VIRTUAL.'value'] = new ConstStub(gmp_strval($gmp), gmp_strval($gmp));

        return $a;
    }
}
