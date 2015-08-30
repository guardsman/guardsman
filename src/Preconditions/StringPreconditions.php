<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\ArgumentNotAString;
use Guardsman\Exceptions\StringTooLong;

trait StringPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws ArgumentNotAString if the subject is not a string.
     *
     * @return $this
     */
    public function isString()
    {
        if (!is_string($this->getSubject())) {
            throw new ArgumentNotAString('Subject must be a string');
        }

        return $this;
    }

    /**
     * @throws ArgumentNotNumeric if the limit is not numeric.
     * @throws ValueTooSmall      if the limit is less than or equal to zero.
     * @throws ArgumentNotAString if the subject is not a string.
     * @throws StringTooLong      if the subject is longer than or equal to $limit.
     *
     * @return $this
     */
    public function isShorterThan($limit)
    {
        \Guardsman\check($limit)->isGreaterThan(0);
        \Guardsman\check($this->getSubject())->isString();

        if (mb_strlen($this->getSubject()) >= $limit) {
            throw new StringTooLong('Subject must be shorter than the limit');
        }

        return $this;
    }

    /**
     * @throws ArgumentNotNumeric if the limit is not numeric.
     * @throws ValueTooSmall      if the limit is less than or equal to zero.
     * @throws ArgumentNotAString if the subject is not a string.
     * @throws StringTooLong      if the subject is greater than $limit.
     *
     * @return $this
     */
    public function isShorterThanOrEqualTo($limit)
    {
        \Guardsman\check($limit)->isGreaterThan(0);
        \Guardsman\check($this->getSubject())->isString();

        if (mb_strlen($this->getSubject()) > $limit) {
            throw new StringTooLong('Subject must be shorter than or equal to the limit');
        }

        return $this;
    }
}
