<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\ArgumentNotADateTime;
use Guardsman\Exceptions\DateTimeTooEarly;
use Guardsman\Exceptions\DateTimeTooLate;

trait DateTimePreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws ArgumentNotADateTime if the subject is not a DateTime.
     * @throws DateTimeTooLate      if the subject is after or equal to the limit.
     *
     * @return $this
     */
    public function isBefore(\DateTimeInterface $limit)
    {
        if (!$this->getSubject() instanceof \DateTimeInterface) {
            throw new ArgumentNotADateTime('Subject must be a DateTime');
        }

        if ($this->getSubject() >= $limit) {
            throw new DateTimeTooLate('Subject must be before the limit');
        }

        return $this;
    }

    /**
     * @throws ArgumentNotADateTime if the subject is not a DateTime.
     * @throws DateTimeTooLate      if the subject is after the limit.
     *
     * @return $this
     */
    public function isBeforeOrEqualTo(\DateTimeInterface $limit)
    {
        if (!$this->getSubject() instanceof \DateTimeInterface) {
            throw new ArgumentNotADateTime('Subject must be a DateTime');
        }

        if ($this->getSubject() > $limit) {
            throw new DateTimeTooLate('Subject must be before or equal to the limit');
        }

        return $this;
    }

    /**
     * @throws ArgumentNotADateTime if the subject is not a DateTime.
     * @throws DateTimeTooEarly     if the subject is before or equal to the limit.
     *
     * @return $this
     */
    public function isAfter(\DateTimeInterface $limit)
    {
        if (!$this->getSubject() instanceof \DateTimeInterface) {
            throw new ArgumentNotADateTime('Subject must be a DateTime');
        }

        if ($this->getSubject() <= $limit) {
            throw new DateTimeTooEarly('Subject must be after the limit');
        }

        return $this;
    }
}