<?php namespace Guardsman\Preconditions;

class ArrayPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function isValueProvider()
    {
        $array = [
            0,
            7,
            7E-10,
            -7,
            '',
            '0',
            '1.2',
            'string',
            [],
            true,
            false,
            null,
            new \stdClass(),
        ];

        return array_map(function ($value) use ($array) {
            return [$value, $array];
        }, $array);
    }

    /**
     * @dataProvider isValueProvider
     */
    public function testIsValue($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isValue($array)
        );
    }

    public function isNotValueProvider()
    {
        return [
            ['string', []],
            ['string', ['String']],
            [0, ['0']],
            [0, [0.0]],
            [true, ['true']],
            [true, [1]],
            [false, [0]],
            [false, []],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueNotFound
     * @dataProvider isNotValueProvider
     */
    public function testIsValueThrowsValueNotFoundException($subject, array $array)
    {
        \Guardsman\check($subject)->isValue($array);
    }

    /**
     * @dataProvider isNotValueProvider
     */
    public function testIsNotValue($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNotValue($array)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueExists
     * @dataProvider isValueProvider
     */
    public function testIsNotValueThrowsValueExistsException($subject, $array)
    {
        \Guardsman\check($subject)->isNotValue($array);
    }
}
