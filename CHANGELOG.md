# :guardsman: Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased][]
- Array preconditions
 - `isValueOf(array $array)`
 - `isNotValueOf(array $array)`
 - `isKeyOf(array $array)`
 - `isNotKeyOf(array $array)`
- DateTime preconditions
 - `isBefore(\DateTimeInterface $limit)`
 - `isBeforeOrEqualTo(\DateTimeInterface $limit)`
 - `isAfter(\DateTimeInterface $limit)`
 - `isAfterOrEqualTo(\DateTimeInterface $limit)`
- Empty preconditions
 - `isNotEmpty()`
- Numeric preconditions
 - `isNumeric()`
 - `isInteger()`
 - `isFloat()`
 - `isGreaterThan($limit)`
 - `isGreaterthanOrEqualTo($limit)`
 - `isLessThan($limit)`
 - `isLessThanOrEqualTo($limit)`
- String preconditions
 - `isString()`
 - `isShorterThan($limit)`
 - `isShorterThanOrEqualTo($limit)`
 - `isLongerThan($limit)`
 - `isLongerThanOrEqualTo($limit)`

[Unreleased]: https://github.com/guardsman/guardsman/compare/26b5a44...HEAD
