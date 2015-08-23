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
}
