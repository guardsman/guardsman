<?php namespace Guardsman;

class Guardsman
{
    use Preconditions\ArrayPreconditions;
    use Preconditions\DateTimePreconditions;
    use Preconditions\EmptyPreconditions;
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
}
