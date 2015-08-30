<?php namespace Guardsman\Preconditions;

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
}
