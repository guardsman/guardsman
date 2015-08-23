<?php namespace Guardsman\Preconditions;

class NumericPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function numericProvider()
    {
        return [
            [0],
            [7],
            [1.2],
            [7E-10],
            [-7],
        ];
    }

    /** @dataProvider numericProvider */
    public function testIsNumeric($subject)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNumeric()
        );
    }

    public function nonNumericProvider()
    {
        return [
            [''],
            ['string'],
            ['0'],
            ['1.2'],
            [[]],
            [true],
            [false],
            [null],
            [new \stdClass()],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsNumericThrowsArgumentNotNumeric($subject)
    {
        \Guardsman\check($subject)->isNumeric();
    }

    public function testIsInteger()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check(7)->isInteger()
        );
    }

    public function nonIntegerProvider()
    {
        return array_merge($this->nonNumericProvider(), [[1.2], [7E-10]]);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotAnInteger
     * @dataProvider nonIntegerProvider
     */
    public function testIsIntegerThrowsArgumentNotAnInteger($subject)
    {
        \Guardsman\check($subject)->isInteger();
    }

    public function testIsFloat()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check(1.23)->isFloat()
        );
    }

    public function nonFloatProvider()
    {
        return array_merge($this->nonNumericProvider(), [[0], [123]]);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotAFloat
     * @dataProvider nonFloatProvider
     */
    public function testIsFloatThrowsArgumentNotAFloat($subject)
    {
        \Guardsman\check($subject)->isFloat();
    }

    public function testIsGreaterThan()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check(7)->isGreaterThan(1)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsGreaterThanGuardsAgainstNonNumericSubjects($subject)
    {
        \Guardsman\check($subject)->isGreaterThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsGreaterThanGuardsAgainstNonNumericLimits($limit)
    {
        \Guardsman\check(0)->isGreaterThan($limit);
    }

    public function gtProvider()
    {
        return [
            [7, 8],
            [7, 7],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooSmall
     * @dataProvider gtProvider
     */
    public function testIsGreaterThanThrowsValueTooSmall($subject, $limit)
    {
        \Guardsman\check($subject)->isGreaterThan($limit);
    }
}
