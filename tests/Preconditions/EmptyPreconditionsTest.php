<?php namespace Guardsman\Preconditions;

class EmptyPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function emptyProvider()
    {
        return [
            ['0'],
            [0],
            [0.0],
            [false],
            [[]],
            [null],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\EmptyValue
     * @dataProvider emptyProvider
     */
    public function testIsNotEmptyThrowsEmptyValue($subject)
    {
        \Guardsman\check($subject)->isNotEmpty();
    }

    public function emptyStringProvider()
    {
        return [
            [''],
            [' '],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringIsEmpty
     * @dataProvider emptyStringProvider
     */
    public function testIsNotEmptyThrowsStringIsEmptyException($subject)
    {
        \Guardsman\check($subject)->isNotEmpty();
    }

    public function notEmptyProvider()
    {
        return [
            ['string'],
            ['123'],
            [1],
            [1.2],
            [7E-10],
            [true],
            [[null]],
        ];
    }

    /** @dataProvider notEmptyProvider */
    public function testIsNotEmpty($subject)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNotEmpty()
        );
    }
}
