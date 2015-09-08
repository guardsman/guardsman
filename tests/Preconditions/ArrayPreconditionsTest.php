<?php namespace Guardsman\Preconditions;

class ArrayPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function isValueOfProvider()
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
     * @dataProvider isValueOfProvider
     */
    public function testisValueOf($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isValueOf($array)
        );
    }

    public function isNotValueOfProvider()
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
     * @dataProvider isNotValueOfProvider
     */
    public function testisValueOfThrowsValueNotFound($subject, array $array)
    {
        \Guardsman\check($subject)->isValueOf($array);
    }

    /**
     * @dataProvider isNotValueOfProvider
     */
    public function testisNotValueOf($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNotValueOf($array)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueExists
     * @dataProvider isValueOfProvider
     */
    public function testisNotValueOfThrowsValueExists($subject, $array)
    {
        \Guardsman\check($subject)->isNotValueOf($array);
    }

    public function isKeyOfProvider()
    {
        $array = [
            'string' => 1,
            'one' => null,
            1 => 'string',
        ];

        return array_map(function ($key) use ($array) {
            return [$key, $array];
        }, array_keys($array));
    }

    /**
     * @dataProvider isKeyOfProvider
     */
    public function testisKeyOf($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isKeyOf($array)
        );
    }

    public function isNotKeyOfProvider()
    {
        return [
            ['string', ['String' => 1]],
            ['string', [1 => 'string']],
            ['string', []],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\KeyNotFound
     * @dataProvider isNotKeyOfProvider
     */
    public function testisKeyOfThrowsKeyNotFound($subject, array $array)
    {
        \Guardsman\check($subject)->isKeyOf($array);
    }

    /**
     * @dataProvider isNotKeyOfProvider
     */
    public function testisNotKeyOf($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNotKeyOf($array)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\KeyExists
     * @dataProvider isKeyOfProvider
     */
    public function testisNotKeyOfThrowsKeyExists($subject, $array)
    {
        \Guardsman\check($subject)->isNotKeyOf($array);
    }
}
