<?php namespace Guardsman\Preconditions;

trait EmptyPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws \UnexpectedValueException if $subject is an empty string when trimmed.
     * @throws \UnexpectedValueException if $subject is empty.
     *
     * @return $this
     */
    public function isNotEmpty()
    {
        if (is_string($this->getSubject()) && empty(trim($this->getSubject()))) {
            throw new \UnexpectedValueException('Subject must not be an empty string when trimmed');
        }

        if (empty($this->getSubject())) {
            throw new \UnexpectedValueException('Subject must not be empty');
        }

        return $this;
    }
}
