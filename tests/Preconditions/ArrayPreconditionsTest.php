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
    public function testisValueOfThrowsValueNotFound($subject, array $array)
    {
        \Guardsman\check($subject)->isValueOf($array);
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
     * @dataProvider isValueOfProvider
     */
    public function testIsNotValueThrowsValueExistsException($subject, $array)
    {
        \Guardsman\check($subject)->isNotValue($array);
    }

    public function isKeyProvider()
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
     * @dataProvider isKeyProvider
     */
    public function testIsKey($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isKey($array)
        );
    }

    public function isNotKeyProvider()
    {
        return [
            ['string', ['String' => 1]],
            ['string', [1 => 'string']],
            ['string', []],
        ];
    }

    /**
     * @expectedException \Guardsman\Exceptions\KeyNotFound
     * @dataProvider isNotKeyProvider
     */
    public function testIsKeyThrowsKeyNotFoundException($subject, array $array)
    {
        \Guardsman\check($subject)->isKey($array);
    }

    /**
     * @dataProvider isNotKeyProvider
     */
    public function testIsNotKey($subject, array $array)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isNotKey($array)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\KeyExists
     * @dataProvider isKeyProvider
     */
    public function testIsNotKeyThrowsKeyExistsException($subject, $array)
    {
        \Guardsman\check($subject)->isNotKey($array);
    }
}
