<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\ArgumentNotNumeric;

trait NumericPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws ArgumentNotNumeric if the subject is not numeric.
     * @throws ArgumentNotNumeric if the subject is a string.
     *
     * @return $this
     */
    public function isNumeric()
    {
        if (!is_numeric($this->getSubject()) || is_string($this->getSubject())) {
            throw new ArgumentNotNumeric('Subject must be numeric');
        }

        return $this;
    }
}
