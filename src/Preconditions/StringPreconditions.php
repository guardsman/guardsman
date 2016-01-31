<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\StringInvalid;
use Guardsman\Exceptions\StringTooLong;
use Guardsman\Exceptions\StringTooShort;
use Guardsman\Exceptions\TypeNotString;

trait StringPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    private function checkEncoding()
    {
        if (!mb_check_encoding($this->getSubject())) {
            throw new StringInvalid('Subject must match mb_internal_encoding');
        }
    }

    /**
     * @throws TypeNotString if the subject is not a string.
     *
     * @return $this
     */
    public function isString()
    {
        if (!is_string($this->getSubject())) {
            throw new TypeNotString('Subject must be a string');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws ValueTooSmall  if $limit is less than or equal to zero.
     * @throws TypeNotString  if the subject is not a string.
     * @throws StringTooLong  if the subject is longer than or equal to $limit.
     *
     * @return $this
     */
    public function isShorterThan($limit)
    {
        $this->isString()->checkEncoding();

        \Guardsman\check($limit)->isGreaterThan(0);

        if (mb_strlen($this->getSubject()) >= $limit) {
            throw new StringTooLong('Subject must be shorter than the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws ValueTooSmall  if $limit is less than or equal to zero.
     * @throws TypeNotString  if the subject is not a string.
     * @throws StringTooLong  if the subject is greater than $limit.
     *
     * @return $this
     */
    public function isShorterThanOrEqualTo($limit)
    {
        $this->isString()->checkEncoding();

        \Guardsman\check($limit)->isGreaterThan(0);

        if (mb_strlen($this->getSubject()) > $limit) {
            throw new StringTooLong('Subject must be shorter than or equal to the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws ValueTooSmall  if $limit is less than or equal to zero.
     * @throws TypeNotString  if the subject is not a string.
     * @throws StringTooShort if the subject is shorter or equal to $limit.
     *
     * @return $this
     */
    public function isLongerThan($limit)
    {
        $this->isString()->checkEncoding();

        \Guardsman\check($limit)->isGreaterThan(0);

        if (mb_strlen($this->getSubject()) <= $limit) {
            throw new StringTooShort('Subject must be longer than the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotNumeric if $limit is not numeric.
     * @throws ValueTooSmall  if $limit is less than or equal to zero.
     * @throws TypeNotString  if the subject is not a string.
     * @throws StringTooShort if the subject is shorter than $limit.
     *
     * @return $this
     */
    public function isLongerThanOrEqualTo($limit)
    {
        $this->isString()->checkEncoding();

        \Guardsman\check($limit)->isGreaterThan(0);

        if (mb_strlen($this->getSubject()) < $limit) {
            throw new StringTooShort('Subject must be longer than or equal to the limit');
        }

        return $this;
    }
}
