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
     * @expectedException \Guardsman\Exceptions\TypeNotFloat
     * @dataProvider nonFloatProvider
     */
    public function testIsFloatThrowsTypeNotFloat($subject)
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

    public function gteProvider()
    {
        return [
            [7, 6],
            [7, 7],
        ];
    }

    /**
     * @dataProvider gteProvider
     */
    public function testIsGreaterThanOrEqualTo($subject, $limit)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isGreaterThanOrEqualTo($limit)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsGreaterThanOrEqualToGuardsAgainstNonNumericSubjects($subject)
    {
        \Guardsman\check($subject)->isGreaterThanOrEqualTo(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsGreaterThanOrEqualToGuardsAgainstNonNumericLimits($limit)
    {
        \Guardsman\check(7)->isGreaterThanOrEqualTo($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooSmall
     */
    public function testIsGreaterThanOrEqualToThrowsValueTooSmall()
    {
        \Guardsman\check(7)->isGreaterThanOrEqualTo(10);
    }

    public function testIsLessThan()
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check(7)->isLessThan(8)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsLessThanGuardsAgainstNonNumericSubjects($subject)
    {
        \Guardsman\check($subject)->isLessThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsLessThanGuardsAgainstNonNumericLimits($limit)
    {
        \Guardsman\check(7)->isLessThan($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooBig
     * @dataProvider gteProvider
     */
    public function testIsLessThanThrowsValueTooBig($subject, $limit)
    {
        \Guardsman\check($subject)->isLessThan($limit);
    }

    /**
     * @dataProvider gtProvider
     */
    public function testIsLessThanOrEqualTo($subject, $limit)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isLessThanOrEqualTo($limit)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsLessThanOrEqualToGuardsAgainstNonNumericSubjects($subject)
    {
        \Guardsman\check($subject)->isLessThanOrEqualTo(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ArgumentNotNumeric
     * @dataProvider nonNumericProvider
     */
    public function testIsLessThanOrEqualToGuardsAgainstNonNumericLimits($limit)
    {
        \Guardsman\check(7)->isLessThanOrEqualTo($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooBig
     */
    public function testIsLessThanOrEqualToThrowsValueTooBigException()
    {
        \Guardsman\check(7)->isLessThanOrEqualTo(1);
    }
}
