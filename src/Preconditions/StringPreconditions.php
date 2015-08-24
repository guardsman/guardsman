<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\ArgumentNotAString;

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
}
