# Guardsman :guardsman:

![travis](https://travis-ci.org/guardsman/guardsman.svg)

A guard clause assertion library to enforce parameter preconditions.

This provides a framework free, simple, chainable api for method parameter validation that throws
exceptions on failure.

It is not intended as a validation library for end user input. If this is your use case then you should
try one of these [validation libraries](https://packagist.org/search/?q=validation) instead.

## Installation

```bash
composer require guardsman/guardsman
```

## Example Usage

```php
public function rename($name) {
    \Guardsman\check($name)
        ->isString()
        ->isNotEmpty();

    …
}
```

```php
public function setSeconds($seconds) {
    \Guardsman\check($seconds)
        ->isInteger()
        ->isGreaterThanOrEqualTo(0)
        ->isLessThan(60);

    …
}
```

```php
public function changeStatus($status) {
    \Guardsman\check($status)
        ->isValueOf(self::validStatuses);

    …
}
```

## Preconditions

### Array

```php
\Guardsman\check($subject)->isValueOf($array);
\Guardsman\check($subject)->isNotValueOf($array);
\Guardsman\check($subject)->isKeyOf($array);
\Guardsman\check($subject)->isNotKeyOf($array);
```

### DateTime

*Methods will first check that the subject is an instance of `\DateTimeInterface`*

```php
\Guardsman\check($subject)->isBefore(\DateTimeInterface $limit);
\Guardsman\check($subject)->isBeforeOrEqualTo(\DateTimeInterface $limit);
\Guardsman\check($subject)->isAfter(\DateTimeInterface $limit);
\Guardsman\check($subject)->isAfterOrEqualTo(\DateTimeInterface $limit);
```

### Empty

```php
\Guardsman\check($subject)->isNotEmpty();
```

### Number

*Methods that accept a limit will first check that the subject is numeric.*
*Limits will then be checked to ensure they are numeric and positive.*

```php
\Guardsman\check($subject)->isNumeric();
\Guardsman\check($subject)->isInteger();
\Guardsman\check($subject)->isFloat();
\Guardsman\check($subject)->isGreaterThan($limit);
\Guardsman\check($subject)->isGreaterthanOrEqualTo($limit);
\Guardsman\check($subject)->isLessThan($limit);
\Guardsman\check($subject)->isLessThanOrEqualTo($limit);
```

### String

*Methods that accept a limit will first check that the subject is a string and that the encoding matches mb_internal_encoding*
*Limits will then be checked to ensure they are numeric and positive.*

```php
\Guardsman\check($subject)->isString();
\Guardsman\check($subject)->isShorterThan($limit);
\Guardsman\check($subject)->isShorterThanOrEqualTo($limit);
\Guardsman\check($subject)->isLongerThan($limit);
\Guardsman\check($subject)->isLongerThanOrEqualTo($limit);
```

### Show Thanks

If you find this useful then please show your thanks with [a small donation](https://paypal.me/le6o/10).
