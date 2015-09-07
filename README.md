# Guardsman :guardsman:

A guard clause assertion library to enforce parameter preconditions.

![travis](https://travis-ci.org/guardsman/guardsman.svg)

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

*All limit based methods will first ensure the subject is numeric*

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

*All limit based methods will first ensure the subject is a string*

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
