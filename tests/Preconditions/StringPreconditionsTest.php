<?php namespace Guardsman\Preconditions;

class StringPreconditionsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        mb_internal_encoding('UTF-8');
    }

    public function isStringProvider()
    {
        return [
            ['string'],
            ['守衛'],
        ];
    }

    /**
     * @dataProvider isStringProvider
     */
    public function testIsString($subject)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isString()
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
     * @expectedException \Guardsman\Exceptions\TypeNotString
     * @dataProvider invalidStringProvider
     */
    public function testIsStringThrowsTypeNotString($subject)
    {
        \Guardsman\check($subject)->isString();
    }

    /**
     * @dataProvider isStringProvider
     */
    public function testIsShorterThan($subject)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isShorterThan(7)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotString
     * @dataProvider invalidStringProvider
     */
    public function testIsShorterThanGuardsAgainstNonStringSubjects($subject)
    {
        \Guardsman\check($subject)->isShorterThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringInvalid
     */
    public function testIsShorterThanGuardsAgainstIncorrectEncoding()
    {
        mb_internal_encoding('ASCII');
        \Guardsman\check('守衛')->isShorterThan(7);
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
            ['守衛', 1],
            ['守衛', 2],
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

    public function lteProvider()
    {
        return [
            ['string', 6],
            ['string', 7],
            ['守衛', 2],
            ['守衛', 3],
        ];
    }

    /**
     * @dataProvider lteProvider
     */
    public function testIsShorterThanOrEqualTo($subject, $limit)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isShorterThanOrEqualTo($limit)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotString
     * @dataProvider invalidStringProvider
     */
    public function testIsShorterThanOrEqualToGuardsAgainstNonStringSubjects($subject)
    {
        \Guardsman\check($subject)->isShorterThanOrEqualTo(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringInvalid
     */
    public function testIsShorterThanOrEqualToGuardsAgainstIncorrectEncoding()
    {
        mb_internal_encoding('ASCII');
        \Guardsman\check('守衛')->isShorterThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooSmall
     * @dataProvider nonPositiveLimitProvider
     */
    public function testIsShorterThanOrEqualToGuardsAgainstNonPositiveLimits($limit)
    {
        \Guardsman\check('string')->isShorterThanOrEqualTo($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringTooLong
     * @dataProvider isStringProvider
     */
    public function testIsShorterThanOrEqualToThrowsStringTooLong($subject)
    {
        \Guardsman\check($subject)->isShorterThanOrEqualTo(1);
    }

    /**
     * @dataProvider isStringProvider
     */
    public function testIsLongerThan($subject)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isLongerThan(1)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotString
     * @dataProvider invalidStringProvider
     */
    public function testIsLongerThanGuardsAgainstNonStringSubjects($subject)
    {
        \Guardsman\check($subject)->isLongerThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringInvalid
     */
    public function testIsLongerThanGuardsAgainstIncorrectEncoding()
    {
        mb_internal_encoding('ASCII');
        \Guardsman\check('守衛')->isShorterThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooSmall
     * @dataProvider nonPositiveLimitProvider
     */
    public function testIsLongerThanGuardsAgainstNonPositiveLimits($limit)
    {
        \Guardsman\check('string')->isLongerThan($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringTooShort
     * @dataProvider lteProvider
     */
    public function testIsLongerThanThrowsStringTooShort($subject, $limit)
    {
        \Guardsman\check($subject)->isLongerThan($limit);
    }

    /**
     * @dataProvider ltProvider
     */
    public function testIsLongerThanOrEqualTo($subject, $limit)
    {
        $this->assertInstanceOf(
            \Guardsman\Guardsman::class,
            \Guardsman\check($subject)->isLongerThanOrEqualTo($limit)
        );
    }

    /**
     * @expectedException \Guardsman\Exceptions\TypeNotString
     * @dataProvider invalidStringProvider
     */
    public function testIsLongerThanOrEqualToGuardsAgainstNonStringSubjects($subject)
    {
        \Guardsman\check($subject)->isLongerThanOrEqualTo(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringInvalid
     */
    public function testIsLongerThanOrEqualToGuardsAgainstIncorrectEncoding()
    {
        mb_internal_encoding('ASCII');
        \Guardsman\check('守衛')->isShorterThan(7);
    }

    /**
     * @expectedException \Guardsman\Exceptions\ValueTooSmall
     * @dataProvider nonPositiveLimitProvider
     */
    public function testIsLongerThanOrEqualToGuardsAgainstNonPositiveLimits($limit)
    {
        \Guardsman\check('string')->isLongerThanOrEqualTo($limit);
    }

    /**
     * @expectedException \Guardsman\Exceptions\StringTooShort
     * @dataProvider isStringProvider
     */
    public function testIsLongerThanOrEqualToThrowsStringTooShort($subject)
    {
        \Guardsman\check($subject)->isLongerThanOrEqualTo(7);
    }
}
