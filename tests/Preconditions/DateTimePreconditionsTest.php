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
    public function testIsBeforeThrowsDateTimeTooLate(
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
     * @expectedException \Guardsman\Exceptions\TypeNotDateTime
     * @dataProvider nonDateTimeProvider
     */
    public function testIsBeforeGuardsAgainstNonDateTimeSubjects($subject)
    {
        \Guardsman\check($subject)->isBefore(new \DateTime('13th July 2014'));
    }

    public function lteDateTimeProvider()
    {
        return [
            [new \DateTime('7th July 1984'), new \DateTime('13th July 2014')],
            [new \DateTime('13th July 2014'), new \DateTime('13th July 2014')],
        ];
    }

    /**
     * @dataProvider lteDateTimeProvider
     */
    public function testIsBeforeOrEqualTo(\DateTimeInterface $subject, \DateTimeInterface $limit)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isBeforeOrEqualTo($limit)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\DateTimeTooLate
     */
    public function testIsBeforeOrEqualToThrowsDateTimeTooLate()
    {
        \Guardsman\check(new \DateTime('13th July 2014'))
            ->isBeforeOrEqualTo(new \DateTime('7th July 1984'));
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotDateTime
     * @dataProvider nonDateTimeProvider
     */
    public function testIsBeforeOrEqualToGuardsAgainstNonDateTimeSubjects($subject)
    {
        \Guardsman\check($subject)->isBeforeOrEqualTo(new \DateTime('13th July 2014'));
    }

    public function testIsAfter()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check(new \DateTime('13th July 2014'))->isAfter(new \DateTime('7th July 1984'))
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\DateTimeTooEarly
     * @dataProvider lteDateTimeProvider
     */
    public function testIsAfterThrowsDateTimeTooEarly(\DateTimeInterface $subject, \DateTimeInterface $limit)
    {
        \Guardsman\check($subject)->isAfter($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotDateTime
     * @dataProvider nonDateTimeProvider
     */
    public function testIsAfterGuardsAgainstNonDateTimeSubjects($subject)
    {
        \Guardsman\check($subject)->isAfter(new \DateTime('13th July 2014'));
    }

    /**
     * @dataProvider gteDateTimeProvider
     */
    public function testIsAfterOrEqualTo(\DateTimeInterface $subject, \DateTimeInterface $limit)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isAfterOrEqualTo($limit)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\DateTimeTooEarly
     */
    public function testIsAfterOrEqualToThrowsDateTimeTooEarly()
    {
        \Guardsman\check(new \DateTime('7th July 1984'))
            ->isAfterOrEqualTo(new \DateTime('13th July 2014'));
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotDateTime
     * @dataProvider nonDateTimeProvider
     */
    public function testIsAfterOrEqualToGuardsAgainstNonDateTimeSubjects($subject)
    {
        \Guardsman\check($subject)->isAfterOrEqualTo(new \DateTime('13th July 2014'));
    }
}
