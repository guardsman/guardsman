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
```

```php
\Guardsman\check($subject)->isNotValueOf($array);
```

```php
\Guardsman\check($subject)->isKeyOf($array);
```

```php
\Guardsman\check($subject)->isNotKeyOf($array);
```

### DateTime

*All methods will first ensure the subject is an instance of `\DateTimeInterface`*

```php
\Guardsman\check($subject)->isBefore($limit);
```

```php
\Guardsman\check($subject)->isBeforeOrEqualTo($limit);
```

```php
\Guardsman\check($subject)->isAfter($limit);
```

```php
\Guardsman\check($subject)->isAfterOrEqualTo($limit);
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
```

```php
\Guardsman\check($subject)->isInteger();
```

```php
\Guardsman\check($subject)->isFloat();
```

```php
\Guardsman\check($subject)->isGreaterThan($limit);
```

```php
\Guardsman\check($subject)->isGreaterthanOrEqualTo($limit);
```

```php
\Guardsman\check($subject)->isLessThan($limit);
```

```php
\Guardsman\check($subject)->isLessThanOrEqualTo($limit);
```

### String

*Methods that accept a limit will first check that the subject is a string and that the encoding matches mb_internal_encoding*
*Limits will then be checked to ensure they are numeric and positive.*

```php
\Guardsman\check($subject)->isString();
```

```php
\Guardsman\check($subject)->isShorterThan($limit);
```

```php
\Guardsman\check($subject)->isShorterThanOrEqualTo($limit);
```

```php
\Guardsman\check($subject)->isLongerThan($limit);
```

```php
\Guardsman\check($subject)->isLongerThanOrEqualTo($limit);
```

### Show Thanks

If you find this useful then please show your thanks with [a small donation](https://paypal.me/le6o/10).
