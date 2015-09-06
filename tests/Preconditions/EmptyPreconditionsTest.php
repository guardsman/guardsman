<?php namespace Guardsman\Preconditions;

class EmptyPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    /** @expectedException \InvalidArgumentException */
    public function testIsNotNullThrowsInvalidArgumentException()
    {
        \Guardsman\check(null)->isNotNull();
    }

    public function notNullProvider()
    {
        return [
            [''],
            [' '],
            ['0'],
            [0],
            [0.0],
            [false],
            [[]],
        ];
    }

    /** @dataProvider notNullProvider */
    public function testIsNotNull($subject)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNotNull()
        );
    }

    public function emptyProvider()
    {
        return array_merge($this->notNullProvider(), [[null]]);
    }

    /**
     * @expectedException \UnexpectedValueException
     * @dataProvider emptyProvider
     */
    public function testIsNotEmptyThrowsUnexpectedValueException($subject)
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
