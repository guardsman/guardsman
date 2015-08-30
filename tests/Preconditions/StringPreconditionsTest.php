<?php namespace Guardsman\Preconditions;

class StringPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function testIsString()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check('string')->isString()
        );
    }

    public function invalidStringProvider()
    {
        return [
            [0],
            [1.2],
            [7E-10],
            [[]],
            [true],
            [false],
            [null],
            [new \stdClass()],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotAString
     * @dataProvider invalidStringProvider
     */
    public function testIsStringThrowsArgumentNotAString($subject)
    {
        \Guardsman\check($subject)->isString();
    }

    public function testIsShorterThan()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check('string')->isShorterThan(7)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotAString
     * @dataProvider invalidStringProvider
     */
    public function testIsShorterThanGuardsAgainstNonStringSubjects($subject)
    {
        \Guardsman\check($subject)->isShorterThan(7);
    }

    public function nonPositiveLimitProvider()
    {
        return [
            [0],
            [-7],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooSmall
     * @dataProvider nonPositiveLimitProvider
     */
    public function testIsShorterThanGuardsAgainstNonPositiveLimits($limit)
    {
        \Guardsman\check('string')->isShorterThan($limit);
    }

    public function ltProvider()
    {
        return [
            ['string', 5],
            ['string', 6],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringTooLong
     * @dataProvider ltProvider
     */
    public function testIsShorterThanThrowsStringTooLong($subject, $limit)
    {
        \Guardsman\check($subject)->isShorterThan($limit);
    }
}
