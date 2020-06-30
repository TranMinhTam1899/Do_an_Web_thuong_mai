<?php

namespace Illuminate\View\Compilers\Concerns;

trait CompilesErrors
{
    /**
     * Compile the error statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileError($expression)
    {
        $expression = $this->stripParentheses($expression);

<<<<<<< HEAD
        return '<?php if ($errors->has('.$expression.')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('.$expression.'); ?>';
=======
        return '<?php $__errorArgs = ['.$expression.'];
$__bag = $errors->getBag($__errorArgs[1] ?? \'default\');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }

    /**
     * Compile the enderror statements into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileEnderror($expression)
    {
        return '<?php unset($message);
<<<<<<< HEAD
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>';
=======
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>';
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    }
}
