<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\ArgumentNotAFloat;
use Guardsman\Exceptions\ArgumentNotAnInteger;
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

    /**
     * @throws ArgumentNotAnInteger if the subject is not an integer.
     *
     * @return $this
     */
    public function isInteger()
    {
        if (!is_integer($this->getSubject())) {
            throw new ArgumentNotAnInteger('Subject must be an integer');
        }

        return $this;
    }

    /**
     * @throws ArgumentNotAFloat if the subject is not a float.
     *
     * @return $this
     */
    public function isFloat()
    {
        if (!is_float($this->getSubject())) {
            throw new ArgumentNotAFloat('Subject must be a float');
        }

        return $this;
    }
}
