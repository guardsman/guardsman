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
}
