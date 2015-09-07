<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\StringIsEmpty;
use Guardsman\Exceptions\ValueIsEmpty;

trait EmptyPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws StringIsEmpty if $subject is an empty string when trimmed.
     * @throws ValueIsEmpty  if $subject is empty.
     *
     * @return $this
     */
    public function isNotEmpty()
    {
        if (is_string($this->getSubject()) && empty(trim($this->getSubject()))) {
            throw new StringIsEmpty('Subject must not be an empty string when trimmed');
        }

        if (empty($this->getSubject())) {
            throw new ValueIsEmpty('Subject must not be empty');
        }

        return $this;
    }
}
