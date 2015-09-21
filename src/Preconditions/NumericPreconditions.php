<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\TypeNotFloat;
use Guardsman\Exceptions\TypeNotInteger;
use Guardsman\Exceptions\TypeNotNumeric;
use Guardsman\Exceptions\ValueTooBig;
use Guardsman\Exceptions\ValueTooSmall;

trait NumericPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws TypeNotNumeric if the subject is not numeric.
     * @throws TypeNotNumeric if the subject is a string.
     *
     * @return $this
     */
    public function isNumeric()
    {
        if (!is_numeric($this->getSubject()) || is_string($this->getSubject())) {
            throw new TypeNotNumeric('Subject must be numeric');
        }

        return $this;
    }

    /**
     * @throws TypeNotInteger if the subject is not an integer.
     *
     * @return $this
     */
    public function isInteger()
    {
        if (!is_integer($this->getSubject())) {
            throw new TypeNotInteger('Subject must be an integer');
        }

        return $this;
    }

    /**
     * @throws TypeNotFloat if the subject is not a float.
     *
     * @return $this
     */
    public function isFloat()
    {
        if (!is_float($this->getSubject())) {
            throw new TypeNotFloat('Subject must be a float');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws TypeNotNumeric if the subject is not numeric.
     * @throws ValueTooSmall  if the subject is less than or equal to $limit.
     *
     * @return $this
     */
    public function isGreaterThan($limit)
    {
        \Guardsman\check($limit)->isNumeric();
        $this->isNumeric();

        if ($this->getSubject() <= $limit) {
            throw new ValueTooSmall('Subject must be greater than the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws TypeNotNumeric if the subject is not numeric.
     * @throws ValueTooSmall  if the subject is less than $limit.
     *
     * @return $this
     */
    public function isGreaterthanOrEqualTo($limit)
    {
        \Guardsman\check($limit)->isNumeric();
        $this->isNumeric();

        if ($this->getSubject() < $limit) {
            throw new ValueTooSmall('Subject must be greater than or equal to the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws TypeNotNumeric if the subject is not numeric.
     * @throws ValueTooBig    if the subject is greater than or equal to $limit.
     *
     * @return $this
     */
    public function isLessThan($limit)
    {
        \Guardsman\check($limit)->isNumeric();
        $this->isNumeric();

        if ($this->getSubject() >= $limit) {
            throw new ValueTooBig('Subject must be less than the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws TypeNotNumeric if the subject is not numeric.
     * @throws ValueTooBig    if the subject is greater than $limit.
     *
     * @return $this
     */
    public function isLessThanOrEqualTo($limit)
    {
        \Guardsman\check($limit)->isNumeric();
        $this->isNumeric();

        if ($this->getSubject() > $limit) {
            throw new ValueTooBig('Subject must be less than or equal to the limit');
        }

        return $this;
    }
}
