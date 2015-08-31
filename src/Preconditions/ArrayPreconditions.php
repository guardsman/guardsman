<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\ValueExists;
use Guardsman\Exceptions\ValueNotFound;

trait ArrayPreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws ValueNotFound if the subject is not a value within the array.
     *
     * @return $this
     */
    public function isValue(array $array)
    {
        if (!in_array($this->getSubject(), $array, true)) {
            throw new ValueNotFound('Subject must be a value within the given array');
        }

        return $this;
    }

    /**
     * @throws ValueExists if the subject is a value within the array.
     *
     * @return $this
     */
    public function isNotValue(array $array)
    {
        if (in_array($this->getSubject(), $array, true)) {
            throw new ValueExists('Subject must not be a value within the given array');
        }

        return $this;
    }
}
