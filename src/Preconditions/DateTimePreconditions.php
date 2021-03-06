<?php namespace Guardsman\Preconditions;

use Guardsman\Exceptions\DateTimeTooEarly;
use Guardsman\Exceptions\DateTimeTooLate;
use Guardsman\Exceptions\TypeNotDateTime;

trait DateTimePreconditions
{
    /** @return mixed */
    abstract public function getSubject();

    /**
     * @throws TypeNotDateTime if the subject is not a DateTime.
     */
    private function isDateTime($subject)
    {
        if (!$subject instanceof \DateTimeInterface) {
            throw new TypeNotDateTime('Subject must be a DateTime');
        }
    }

    /**
     * @throws TypeNotDateTime if the subject is not a DateTime.
     * @throws DateTimeTooLate if the subject is after or equal to $limit.
     *
     * @return $this
     */
    public function isBefore(\DateTimeInterface $limit)
    {
        $this->isDateTime($this->getSubject());

        if ($this->getSubject() >= $limit) {
            throw new DateTimeTooLate('Subject must be before the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotDateTime if the subject is not a DateTime.
     * @throws DateTimeTooLate if the subject is after $limit.
     *
     * @return $this
     */
    public function isBeforeOrEqualTo(\DateTimeInterface $limit)
    {
        $this->isDateTime($this->getSubject());

        if ($this->getSubject() > $limit) {
            throw new DateTimeTooLate('Subject must be before or equal to the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotDateTime  if the subject is not a DateTime.
     * @throws DateTimeTooEarly if the subject is before or equal to $limit.
     *
     * @return $this
     */
    public function isAfter(\DateTimeInterface $limit)
    {
        $this->isDateTime($this->getSubject());

        if ($this->getSubject() <= $limit) {
            throw new DateTimeTooEarly('Subject must be after the limit');
        }

        return $this;
    }

    /**
     * @throws TypeNotDateTime  if the subject is not a DateTime.
     * @throws DateTimeTooEarly if the subject is before $limit.
     *
     * @return $this
     */
    public function isAfterOrEqualTo(\DateTimeInterface $limit)
    {
        $this->isDateTime($this->getSubject());

        if ($this->getSubject() < $limit) {
            throw new DateTimeTooEarly('Subject must be after or equal to the limit');
        }

        return $this;
    }
}
