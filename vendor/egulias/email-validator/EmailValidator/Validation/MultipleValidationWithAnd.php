<?php

namespace Egulias\EmailValidator\Validation;

use Egulias\EmailValidator\EmailLexer;
use Egulias\EmailValidator\Validation\Exception\EmptyValidationList;

class MultipleValidationWithAnd implements EmailValidation
{
    /**
     * If one of validations gets failure skips all succeeding validation.
     * This means MultipleErrors will only contain a single error which first found.
     */
    const STOP_ON_ERROR = 0;

    /**
     * All of validations will be invoked even if one of them got failure.
     * So MultipleErrors will contain all causes.
     */
    const ALLOW_ALL_ERRORS = 1;

    /**
     * @var EmailValidation[]
     */
    private $validations = [];

    /**
     * @var array
     */
    private $warnings = [];

    /**
<<<<<<< HEAD
     * @var MultipleErrors|null
=======
     * @var MultipleErrors
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $error;

    /**
<<<<<<< HEAD
     * @var int
=======
     * @var bool
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $mode;

    /**
     * @param EmailValidation[] $validations The validations.
     * @param int               $mode        The validation mode (one of the constants).
     */
    public function __construct(array $validations, $mode = self::ALLOW_ALL_ERRORS)
    {
        if (count($validations) == 0) {
            throw new EmptyValidationList();
        }

        $this->validations = $validations;
        $this->mode = $mode;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($email, EmailLexer $emailLexer)
    {
        $result = true;
        $errors = [];
        foreach ($this->validations as $validation) {
            $emailLexer->reset();
            $validationResult = $validation->isValid($email, $emailLexer);
            $result = $result && $validationResult;
            $this->warnings = array_merge($this->warnings, $validation->getWarnings());
            $errors = $this->addNewError($validation->getError(), $errors);

            if ($this->shouldStop($result)) {
                break;
            }
        }

        if (!empty($errors)) {
            $this->error = new MultipleErrors($errors);
        }

        return $result;
    }

<<<<<<< HEAD
    /**
     * @param \Egulias\EmailValidator\Exception\InvalidEmail|null $possibleError
     * @param \Egulias\EmailValidator\Exception\InvalidEmail[] $errors
     *
     * @return \Egulias\EmailValidator\Exception\InvalidEmail[]
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private function addNewError($possibleError, array $errors)
    {
        if (null !== $possibleError) {
            $errors[] = $possibleError;
        }

        return $errors;
    }

<<<<<<< HEAD
    /**
     * @param bool $result
     *
     * @return bool
     */
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    private function shouldStop($result)
    {
        return !$result && $this->mode === self::STOP_ON_ERROR;
    }

    /**
<<<<<<< HEAD
     * Returns the validation errors.
     *
     * @return MultipleErrors|null
=======
     * {@inheritdoc}
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function getWarnings()
    {
        return $this->warnings;
    }
}
