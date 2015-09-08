<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\KeyExists;
use Guardsman\Exceptions\KeyNotFound;
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
    public function isValueOf(array $array)
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
    public function isNotValueOf(array $array)
    {
        if (in_array($this->getSubject(), $array, true)) {
            throw new ValueExists('Subject must not be a value within the given array');
        }

        return $this;
    }

    /**
     * @throws KeyNotFound if the subject is not a key within the array.
     *
     * @return $this
     */
    public function isKeyOf(array $array)
    {
        if (!array_key_exists($this->getSubject(), $array)) {
            throw new KeyNotFound('Subject must be a key of the given array.');
        }

        return $this;
    }

    /**
     * @throws KeyExists if the subject is a key within the array.
     *
     * @return $this
     */
    public function isNotKey(array $array)
    {
        if (array_key_exists($this->getSubject(), $array)) {
            throw new KeyExists('Subject must not be a key of the given array.');
        }

        return $this;
    }
}
