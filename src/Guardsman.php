<?php namespace Guardsman;

class Guardsman
{
    use Preconditions\NumericPreconditions;
    use Preconditions\StringPreconditions;

    /** @var mixed */
    protected $subject;

    /** @param mixed $subject The subject being checked. */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    /** {@inheritdoc} */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @throws \InvalidArgumentException if $subject is null.
     */
    public function isNotNull()
    {
        if ($this->subject === null) {
            throw new \InvalidArgumentException('Subject should not be null');
        }
    }

    /**
     * @throws \UnexpectedValueException if $subject is an empty string when trimmed.
     * @throws \UnexpectedValueException if $subject is empty.
     */
    public function isNotEmpty()
    {
        if (is_string($this->subject) && empty(trim($this->subject))) {
            throw new \UnexpectedValueException('Subject must not be an empty string when trimmed');
        }

        if (empty($this->subject)) {
            throw new \UnexpectedValueException('Subject must not be empty');
        }
    }
}
