--TEST--
Mock method and call original method with argument
--FILE--
<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
class Foo
{
    private function bar($arg){}
}

require __DIR__ . '/../../../../vendor/autoload.php';

$class = new ReflectionClass('Foo');
$mockMethod = \PHPUnit\Framework\MockObject\MockMethod::fromReflection(
    $class->getMethod('bar'),
    true,
    false
);

$code = $mockMethod->generateCode();

print $code;
<<<<<<< HEAD
?>
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
--EXPECT--

private function bar($arg)
    {
        $__phpunit_arguments = [$arg];
        $__phpunit_count     = func_num_args();

        if ($__phpunit_count > 1) {
            $__phpunit_arguments_tmp = func_get_args();

            for ($__phpunit_i = 1; $__phpunit_i < $__phpunit_count; $__phpunit_i++) {
                $__phpunit_arguments[] = $__phpunit_arguments_tmp[$__phpunit_i];
            }
        }

<<<<<<< HEAD
        $__phpunit_invocation = new \PHPUnit\Framework\MockObject\Invocation\ObjectInvocation(
            'Foo', 'bar', $__phpunit_arguments, '', $this, false
        );

        $__phpunit_invocation->setProxiedCall();

        $this->__phpunit_getInvocationMocker()->invoke($__phpunit_invocation);

        unset($__phpunit_invocation);

=======
        $this->__phpunit_getInvocationHandler()->invoke(
            new \PHPUnit\Framework\MockObject\Invocation(
                'Foo', 'bar', $__phpunit_arguments, '', $this, false, true
            )
        );

>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
        return call_user_func_array(array($this->__phpunit_originalObject, "bar"), $__phpunit_arguments);
    }
