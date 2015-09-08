<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\EmptyString;
use Guardsman\Exceptions\EmptyValue;

trait EmptyPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws EmptyString if $subject is an empty string when trimmed.
     * @throws EmptyValue  if $subject is empty.
     *
     * @return $this
     */
    public function isNotEmpty()
    {
        if (is_string($this->getSubject()) && empty(trim($this->getSubject()))) {
            throw new EmptyString('Subject must not be an empty string when trimmed');
        }

        if (empty($this->getSubject())) {
            throw new EmptyValue('Subject must not be empty');
        }

        return $this;
    }
}
