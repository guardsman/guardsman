<?php namespace Guardsman\Preconditions;

class DateTimePreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function testIsBefore()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check(new \DateTime('7th July 1984'))->isBefore(new \DateTime('13th July 2014'))
        );
    }

    public function gteDateTimeProvider()
    {
        return [
            [new \DateTime('13th July 2014'), new \DateTime('7th July 1984')],
            [new \DateTime('13th July 2014'), new \DateTime('13th July 2014')],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\DateTimeTooLate
     * @dataProvider gteDateTimeProvider
     */
    public function testIsBeforeThrowsDateTimeTooLateException(
        \DateTimeInterface $subject,
        \DateTimeInterface $limit
    ) {
        \Guardsman\check($subject)->isBefore($limit);
    }

    public function nonDateTimeProvider()
    {
        return [
            ['7th July 1984'],
            [458078520],
            [[]],
            [true],
            [false],
            [null],
            [new \stdClass()],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotADateTime
     * @dataProvider nonDateTimeProvider
     */
    public function testIsBeforeGuardsAgainstNonDateTimeSubjects($subject)
    {
        \Guardsman\check($subject)->isBefore(new \DateTime('13th July 2014'));
    }
}
