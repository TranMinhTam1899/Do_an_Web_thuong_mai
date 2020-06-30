# ramsey/uuid Changelog

<<<<<<< HEAD
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).


## [Unreleased]

### Added

### Changed

### Deprecated

### Removed

### Fixed

### Security


## [3.9.3] - 2020-02-20

### Fixed

* For v1 UUIDs, round down for timestamps so that microseconds do not bump the
  timestamp to the next second.

  As an example, consider the case of timestamp `1` with  `600000` microseconds
  (`1.600000`). This is the first second after midnight on January 1, 1970, UTC.
  Previous versions of this library had a bug that would round this to `2`, so
  the rendered time was `1970-01-01 00:00:02`. This was incorrect. Despite
  having `600000` microseconds, the time should not round up to the next second.
  Rather, the time should be `1970-01-01 00:00:01.600000`. Since this version of
  ramsey/uuid does not support microseconds, the microseconds are dropped, and
  the time is `1970-01-01 00:00:01`. No rounding should occur.


## [3.9.2] - 2019-12-17

### Fixed

* Check whether files returned by `/sys/class/net/*/address` are readable
  before attempting to read them. This avoids a PHP warning that was being
  emitted on hosts that do not grant permission to read these files.


## [3.9.1] - 2019-12-01

### Fixed

* Fix `RandomNodeProvider` behavior on 32-bit systems. The `RandomNodeProvider`
  was converting a 6-byte string to a decimal number, which is a 48-bit,
  unsigned integer. This caused problems on 32-bit systems and has now been
  resolved.


## [3.9.0] - 2019-11-30

### Added

* Add function API as convenience. The functions are available in the
  `Ramsey\Uuid` namespace.
  * `v1(int|string|null $node = null, int|null $clockSeq = null): string`
  * `v3(string|UuidInterface $ns, string $name): string`
  * `v4(): string`
  * `v5(string|UuidInterface $ns, string $name): string`

### Changed

* Use paragonie/random-lib instead of ircmaxell/random-lib. This is a
  non-breaking change.
* Use a high-strength generator by default, when using `RandomLibAdapter`. This
  is a non-breaking change.

### Deprecated

These will be removed in ramsey/uuid version 4.0.0:

* `MtRandGenerator`, `OpenSslGenerator`, and `SodiumRandomGenerator` are
  deprecated in favor of using the default `RandomBytesGenerator`.

### Fixed

* Set `ext-json` as a required dependency in `composer.json`.
* Use `PHP_OS` instead of `php_uname()` when determining the system OS, for
  cases when `php_uname()` is disabled for security reasons.


## [3.8.0] - 2018-07-19

### Added

* Support discovery of MAC addresses on FreeBSD systems
* Use a polyfill to provide PHP ctype functions when running on systems where the
  ctype functions are not part of the PHP build
* Disallow a trailing newline character when validating UUIDs
* Annotate thrown exceptions for improved IDE hinting


## [3.7.3] - 2018-01-19

### Fixed

* Gracefully handle cases where `glob()` returns false when searching
  `/sys/class/net/*/address` files on Linux
* Fix off-by-one error in `DefaultTimeGenerator`

### Security

* Switch to `random_int()` from `mt_rand()` for better random numbers


## [3.7.2] - 2018-01-13

### Fixed

* Check sysfs on Linux to determine the node identifier; this provides a
  reliable way to identify the node on Docker images, etc.


## [3.7.1] - 2017-09-22

### Fixed

* Set the multicast bit for random nodes, according to RFC 4122, §4.5

### Security

* Use `random_bytes()` when generating random nodes


## [3.7.0] - 2017-08-04

### Added

* Add the following UUID version constants:
=======
## 3.8.0

_Released: 2018-07-19_

  * Add support for determining MAC address on FreeBSD systems ([#212](https://github.com/ramsey/uuid/pull/212))
  * Add a polyfill for PHP ctype functions to support systems where the ctype functions are not part of the PHP build ([#223](https://github.com/ramsey/uuid/pull/223))
  * Improve validation to disallow UUIDs with a trailing newline character ([#225](https://github.com/ramsey/uuid/pull/225))
  * Add annotations for thrown exceptions for improved IDE hinting ([#232](https://github.com/ramsey/uuid/pull/232))
  * Improve documentation, testing, and project metadata (i.e. `.gitattributes`, etc.)

## 3.7.3

_Released: 2018-01-19_

  * In rare cases, when using `glob()` to find `/sys/class/net/*/address` files on Linux, `glob()` encountered errors, returning `false` instead of an empty array, causing `array_map()` to emit warnings since its second parameter was not an array; this release gracefully handles cases where `glob()` returns `false` [#203](https://github.com/ramsey/uuid/issues/203)
  * Fixed an off-by-one error in `DefaultTimeGenerator` and switching to `random_int()` from `mt_rand()` for better random numbers [#206](https://github.com/ramsey/uuid/pull/206)

## 3.7.2

_Released: 2018-01-13_

  * On Linux, first check sysfs to determine node identifier; this provides a reliable way to identify the node on Docker images, etc. [#185](https://github.com/ramsey/uuid/pull/185)

## 3.7.1

_Released: 2017-09-22_

  * Use `random_bytes()` when generating random nodes
  * Set the multicast bit for random nodes, according to RFC 4122, §4.5, [#170](https://github.com/ramsey/uuid/pull/170), [#171](https://github.com/ramsey/uuid/pull/171), [#182](https://github.com/ramsey/uuid/pull/182)

## 3.7.0

_Released: 2017-08-04_

  * Add UUID version constants [#173](https://github.com/ramsey/uuid/issues/173), [#177](https://github.com/ramsey/uuid/pull/177)
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
    * `Uuid::UUID_TYPE_TIME`
    * `Uuid::UUID_TYPE_IDENTIFIER`
    * `Uuid::UUID_TYPE_HASH_MD5`
    * `Uuid::UUID_TYPE_RANDOM`
    * `Uuid::UUID_TYPE_HASH_SHA1`

<<<<<<< HEAD

## [3.6.1] - 2017-03-26

### Fixed

* Optimize UUID string decoding by using `str_pad()` instead of `sprintf()`


## [3.6.0] - 2017-03-18

### Added

* Add `InvalidUuidStringException`, which is thrown when attempting to decode an
  invalid string UUID; this does not introduce any BC issues, since the new
  exception inherits from the previously used `InvalidArgumentException`

### Fixed

* Improve memory usage when generating large quantities of UUIDs (use `str_pad()`
  and `dechex()` instead of `sprintf()`)


## [3.5.2] - 2016-11-22

### Fixed

* Improve test coverage


## [3.5.1] - 2016-10-02

### Fixed

* Fix issue where the same UUIDs were not being treated as equal when using
  mixed cases


## [3.5.0] - 2016-08-02

### Added

* Add `OrderedTimeCodec` to store UUID in an optimized way for InnoDB

### Fixed

* Fix invalid node generation in `RandomNodeProvider`
* Avoid multiple unnecessary system calls by caching failed attempt to retrieve
  system node


## [3.4.1] - 2016-04-23

### Fixed

* Fix test that violated a PHP CodeSniffer rule, breaking the build


## [3.4.0] - 2016-04-23

### Added

* Add `TimestampFirstCombCodec` and `TimestampLastCombCodec` codecs to provide
  the ability to generate [COMB sequential UUIDs] with the timestamp encoded as
  either the first 48 bits or the last 48 bits
* Improve logic of `CombGenerator` for COMB sequential UUIDs


## [3.3.0] - 2016-03-22

### Security

* Drop the use of OpenSSL as a fallback and use [paragonie/random_compat] to
  support `RandomBytesGenerator` in versions of PHP earlier than 7.0;
  this addresses and fixes the [collision issue]


## [3.2.0] - 2016-02-17

### Added

* Add `SodiumRandomGenerator` to allow use of the [PECL libsodium extension] as
  a random bytes generator when creating UUIDs


## [3.1.0] - 2015-12-17

### Added

* Implement the PHP `Serializable` interface to provide the ability to
  serialize/unserialize UUID objects


## [3.0.1] - 2015-10-21

### Added

* Adopt the [Contributor Code of Conduct] for this project


## [3.0.0] - 2015-09-28

The 3.0.0 release represents a significant step for the ramsey/uuid library.
While the simple and familiar API used in previous versions remains intact, this
release provides greater flexibility to integrators, including the ability to
inject your own number generators, UUID codecs, node and time providers, and
more.

*Please note: The changelog for 3.0.0 includes all notes from the alpha and beta
versions leading up to this release.*

### Added

* Add a number of generators that may be used to override the library defaults
  for generating random bytes (version 4) or time-based (version 1) UUIDs
  * `CombGenerator` to allow generation of sequential UUIDs
  * `OpenSslGenerator` to generate random bytes on systems where
    `openssql_random_pseudo_bytes()` is present
  * `MtRandGenerator` to provide a fallback in the event other random generators
    are not present
  * `RandomLibAdapter` to allow use of [ircmaxell/random-lib]
  * `RandomBytesGenerator` for use with PHP 7; ramsey/uuid will default to use
    this generator when running on PHP 7
  * Refactor time-based (version 1) UUIDs into a `TimeGeneratorInterface` to
    allow for other sources to generate version 1 UUIDs in this library
  * `PeclUuidTimeGenerator` and `PeclUuidRandomGenerator` for creating version
    1 or version 4 UUIDs using the pecl-uuid extension
* Add a `setTimeGenerator` method on `UuidFactory` to override the default time
  generator
* Add option to enable `PeclUuidTimeGenerator` via `FeatureSet`
* Support GUID generation by configuring a `FeatureSet` to use GUIDs
* Allow UUIDs to be serialized as JSON through `JsonSerializable`

### Changed

* Change root namespace from "Rhumsaa" to "Ramsey;" in most cases, simply
  making this change in your applications is the only upgrade path you will
  need—everything else should work as expected
* No longer consider `Uuid` class as `final`; everything is now based around
  interfaces and factories, allowing you to use this package as a base to
  implement other kinds of UUIDs with different dependencies
* Return an object of type `DegradedUuid` on 32-bit systems to indicate that
  certain features are not available
* Default `RandomLibAdapter` to a medium-strength generator with
  [ircmaxell/random-lib]; this is configurable, so other generator strengths may
  be used

### Removed

* Remove `PeclUuidFactory` in favor of using pecl-uuid with generators
* Remove `timeConverter` and `timeProvider` properties, setters, and getters in
  both `FeatureSet` and `UuidFactory` as those are now exclusively used by the
  default `TimeGenerator`
* Move UUID [Doctrine field type] to [ramsey/uuid-doctrine]
* Move `uuid` console application to [ramsey/uuid-console]
* Remove `Uuid::VERSION` package version constant

### Fixed

* Improve GUID support to ensure that:
  * On little endian (LE) architectures, the byte order of the first three
    fields is LE
  * On big endian (BE) architectures, it is the same as a GUID
  * String representation is always the same
* Fix exception message for `DegradedNumberConverter::fromHex()`


## [3.0.0-beta1] - 2015-08-31

### Fixed

* Improve GUID support to ensure that:
  * On little endian (LE) architectures, the byte order of the first three
    fields is LE
  * On big endian (BE) architectures, it is the same as a GUID
  * String representation is always the same
* Fix exception message for `DegradedNumberConverter::fromHex()`


## [3.0.0-alpha3] - 2015-07-28

### Added

* Enable use of custom `TimeGenerator` implementations
* Add a `setTimeGenerator` method on `UuidFactory` to override the default time
  generator
* Add option to enable `PeclUuidTimeGenerator` via `FeatureSet`

### Removed

* Remove `timeConverter` and `timeProvider` properties, setters, and getters in
  both `FeatureSet` and `UuidFactory` as those are now exclusively used by the
  default `TimeGenerator`


## [3.0.0-alpha2] - 2015-07-28

### Added

* Refactor time-based (version 1) UUIDs into a `TimeGeneratorInterface` to allow
  for other sources to generate version 1 UUIDs in this library
* Add `PeclUuidTimeGenerator` and `PeclUuidRandomGenerator` for creating version
  1 or version 4 UUIDs using the pecl-uuid extension
* Add `RandomBytesGenerator` for use with PHP 7. ramsey/uuid will default to use
  this generator when running on PHP 7

### Changed

* Default `RandomLibAdapter` to a medium-strength generator with
  [ircmaxell/random-lib]; this is configurable, so other generator strengths may
  be used

### Removed

* Remove `PeclUuidFactory` in favor of using pecl-uuid with generators


## [3.0.0-alpha1] - 2015-07-16

### Added

* Allow dependency injection through `UuidFactory` and/or extending `FeatureSet`
  to override any package defaults
* Add a number of generators that may be used to override the library defaults:
  * `CombGenerator` to allow generation of sequential UUIDs
  * `OpenSslGenerator` to generate random bytes on systems where
    `openssql_random_pseudo_bytes()` is present
  * `MtRandGenerator` to provide a fallback in the event other random generators
    are not present
  * `RandomLibAdapter` to allow use of [ircmaxell/random-lib]
* Support GUID generation by configuring a `FeatureSet` to use GUIDs
* Allow UUIDs to be serialized as JSON through `JsonSerializable`

### Changed

* Change root namespace from "Rhumsaa" to "Ramsey;" in most cases, simply
  making this change in your applications is the only upgrade path you will
  need—everything else should work as expected
* No longer consider `Uuid` class as `final`; everything is now based around
  interfaces and factories, allowing you to use this package as a base to
  implement other kinds of UUIDs with different dependencies
* Return an object of type `DegradedUuid` on 32-bit systems to indicate that
  certain features are not available

### Removed

* Move UUID [Doctrine field type] to [ramsey/uuid-doctrine]
* Move `uuid` console application to [ramsey/uuid-console]
* Remove `Uuid::VERSION` package version constant


## [2.9.0] - 2016-03-22

### Security

* Drop the use of OpenSSL as a fallback and use [paragonie/random_compat] to
  support `RandomBytesGenerator` in versions of PHP earlier than 7.0;
  this addresses and fixes the [collision issue]


## [2.8.4] - 2015-12-17

### Added

* Add support for symfony/console v3 in the `uuid` CLI application


## [2.8.3] - 2015-08-31

### Fixed

* Fix exception message in `Uuid::calculateUuidTime()`


## [2.8.2] - 2015-07-23

### Fixed

* Ensure the release tag makes it into the rhumsaa/uuid package


## [2.8.1] - 2015-06-16

### Fixed

* Use `passthru()` and output buffering in `getIfconfig()`
* Cache the system node in a static variable so that we process it only once per
  runtime


## [2.8.0] - 2014-11-09

### Added

* Add static `fromInteger()` method to create UUIDs from string integer or
  `Moontoast\Math\BigNumber`

### Fixed

* Improve Doctrine conversion to Uuid or string for the ramsey/uuid [Doctrine
  field type]


## [2.7.4] - 2014-10-29

### Fixed

* Change loop in `generateBytes()` from `foreach` to `for`


## [2.7.3] - 2014-08-27

### Fixed

* Fix upper range for `mt_rand` used in version 4 UUIDs


## [2.7.2] - 2014-07-28

### Changed

* Upgrade to PSR-4 autoloading


## [2.7.1] - 2014-02-19

### Fixed

* Move moontoast/math and symfony/console to require-dev
* Support symfony/console 2.3 (LTS version)


## [2.7.0] - 2014-01-31

### Added

* Add `Uuid::VALID_PATTERN` constant containing a UUID validation regex pattern


## [2.6.1] - 2014-01-27

### Fixed

* Fix bug where `uuid` console application could not find the Composer
  autoloader when installed in another project


## [2.6.0] - 2014-01-17

### Added

* Introduce `uuid` console application for generating and decoding UUIDs from
  CLI (run `./bin/uuid` for details)
* Add `Uuid::getInteger()` to retrieve a `Moontoast\Math\BigNumber`
  representation of the 128-bit integer representing the UUID
* Add `Uuid::getHex()` to retrieve the hexadecimal representation of the UUID
* Use `netstat` on Linux to capture the node for a version 1 UUID
* Require moontoast/math as part of the regular package requirements


## [2.5.0] - 2013-10-30

### Added

* Use `openssl_random_pseudo_bytes()`, if available, to generate random bytes


## [2.4.0] - 2013-07-29

### Added

* Return `null` from `Uuid::getVersion()` if the UUID isn't an RFC 4122 variant
* Support string UUIDs without dashes passed to `Uuid::fromString()`


## [2.3.0] - 2013-07-16

### Added

* Support creation of UUIDs from bytes with `Uuid::fromBytes()`


## [2.2.0] - 2013-07-04

### Added

* Add `Doctrine\UuidType::requiresSQLCommentHint()` method


## [2.1.2] - 2013-07-03

### Fixed

* Fix cases where the system node was coming back with uppercase hexadecimal
  digits; this ensures that case in the node is converted to lowercase


## [2.1.1] - 2013-04-29

### Fixed

* Fix bug in `Uuid::isValid()` where the NIL UUID was not reported as valid


## [2.1.0] - 2013-04-15

### Added

* Allow checking the validity of a UUID through the `Uuid::isValid()` method


## [2.0.0] - 2013-02-11

### Added

* Support UUID generation on 32-bit platforms

### Changed

* Mark `Uuid` class `final`
* Require moontoast/math on 64-bit platforms for
  `Uuid::getLeastSignificantBits()` and `Uuid::getMostSignificantBits()`; the
  integers returned by these methods are *unsigned* 64-bit integers and
  unsupported even on 64-bit builds of PHP
* Move `UnsupportedOperationException` to the `Exception` subnamespace


## [1.1.2] - 2012-11-29

### Fixed

* Relax [Doctrine field type] conversion rules for UUIDs


## [1.1.1] - 2012-08-27

### Fixed

* Remove `final` keyword from `Uuid` class


## [1.1.0] - 2012-08-06

### Added

* Support ramsey/uuid UUIDs as a Doctrine Database Abstraction Layer (DBAL)
  field mapping type


## [1.0.0] - 2012-07-19

### Added

* Support generation of version 1, 3, 4, and 5 UUIDs


[comb sequential uuids]: http://www.informit.com/articles/article.aspx?p=25862&seqNum=7
[paragonie/random_compat]: https://github.com/paragonie/random_compat
[collision issue]: https://github.com/ramsey/uuid/issues/80
[contributor code of conduct]: https://github.com/ramsey/uuid/blob/master/.github/CODE_OF_CONDUCT.md
[pecl libsodium extension]: http://pecl.php.net/package/libsodium
[ircmaxell/random-lib]: https://github.com/ircmaxell/RandomLib
[doctrine field type]: http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html
[ramsey/uuid-doctrine]: https://github.com/ramsey/uuid-doctrine
[ramsey/uuid-console]: https://github.com/ramsey/uuid-console

[unreleased]: https://github.com/ramsey/uuid/compare/3.9.3...HEAD
[3.9.3]: https://github.com/ramsey/uuid/compare/3.9.2...3.9.3
[3.9.2]: https://github.com/ramsey/uuid/compare/3.9.1...3.9.2
[3.9.1]: https://github.com/ramsey/uuid/compare/3.9.0...3.9.1
[3.9.0]: https://github.com/ramsey/uuid/compare/3.8.0...3.9.0
[3.8.0]: https://github.com/ramsey/uuid/compare/3.7.3...3.8.0
[3.7.3]: https://github.com/ramsey/uuid/compare/3.7.2...3.7.3
[3.7.2]: https://github.com/ramsey/uuid/compare/3.7.1...3.7.2
[3.7.1]: https://github.com/ramsey/uuid/compare/3.7.0...3.7.1
[3.7.0]: https://github.com/ramsey/uuid/compare/3.6.1...3.7.0
[3.6.1]: https://github.com/ramsey/uuid/compare/3.6.0...3.6.1
[3.6.0]: https://github.com/ramsey/uuid/compare/3.5.2...3.6.0
[3.5.2]: https://github.com/ramsey/uuid/compare/3.5.1...3.5.2
[3.5.1]: https://github.com/ramsey/uuid/compare/3.5.0...3.5.1
[3.5.0]: https://github.com/ramsey/uuid/compare/3.4.1...3.5.0
[3.4.1]: https://github.com/ramsey/uuid/compare/3.4.0...3.4.1
[3.4.0]: https://github.com/ramsey/uuid/compare/3.3.0...3.4.0
[3.3.0]: https://github.com/ramsey/uuid/compare/3.2.0...3.3.0
[3.2.0]: https://github.com/ramsey/uuid/compare/3.1.0...3.2.0
[3.1.0]: https://github.com/ramsey/uuid/compare/3.0.1...3.1.0
[3.0.1]: https://github.com/ramsey/uuid/compare/3.0.0...3.0.1
[3.0.0]: https://github.com/ramsey/uuid/compare/3.0.0-beta1...3.0.0
[3.0.0-beta1]: https://github.com/ramsey/uuid/compare/3.0.0-alpha3...3.0.0-beta1
[3.0.0-alpha3]: https://github.com/ramsey/uuid/compare/3.0.0-alpha2...3.0.0-alpha3
[3.0.0-alpha2]: https://github.com/ramsey/uuid/compare/3.0.0-alpha1...3.0.0-alpha2
[3.0.0-alpha1]: https://github.com/ramsey/uuid/compare/2.9.0...3.0.0-alpha1
[2.9.0]: https://github.com/ramsey/uuid/compare/2.8.4...2.9.0
[2.8.4]: https://github.com/ramsey/uuid/compare/2.8.3...2.8.4
[2.8.3]: https://github.com/ramsey/uuid/compare/2.8.2...2.8.3
[2.8.2]: https://github.com/ramsey/uuid/compare/2.8.1...2.8.2
[2.8.1]: https://github.com/ramsey/uuid/compare/2.8.0...2.8.1
[2.8.0]: https://github.com/ramsey/uuid/compare/2.7.4...2.8.0
[2.7.4]: https://github.com/ramsey/uuid/compare/2.7.3...2.7.4
[2.7.3]: https://github.com/ramsey/uuid/compare/2.7.2...2.7.3
[2.7.2]: https://github.com/ramsey/uuid/compare/2.7.1...2.7.2
[2.7.1]: https://github.com/ramsey/uuid/compare/2.7.0...2.7.1
[2.7.0]: https://github.com/ramsey/uuid/compare/2.6.1...2.7.0
[2.6.1]: https://github.com/ramsey/uuid/compare/2.6.0...2.6.1
[2.6.0]: https://github.com/ramsey/uuid/compare/2.5.0...2.6.0
[2.5.0]: https://github.com/ramsey/uuid/compare/2.4.0...2.5.0
[2.4.0]: https://github.com/ramsey/uuid/compare/2.3.0...2.4.0
[2.3.0]: https://github.com/ramsey/uuid/compare/2.2.0...2.3.0
[2.2.0]: https://github.com/ramsey/uuid/compare/2.1.2...2.2.0
[2.1.2]: https://github.com/ramsey/uuid/compare/2.1.1...2.1.2
[2.1.1]: https://github.com/ramsey/uuid/compare/2.1.0...2.1.1
[2.1.0]: https://github.com/ramsey/uuid/compare/2.0.0...2.1.0
[2.0.0]: https://github.com/ramsey/uuid/compare/1.1.2...2.0.0
[1.1.2]: https://github.com/ramsey/uuid/compare/1.1.1...1.1.2
[1.1.1]: https://github.com/ramsey/uuid/compare/1.1.0...1.1.1
[1.1.0]: https://github.com/ramsey/uuid/compare/1.0.0...1.1.0
[1.0.0]: https://github.com/ramsey/uuid/commits/1.0.0
=======
## 3.6.1

_Released: 2017-03-26_

  * Optimize UUID string decoding [#164](https://github.com/ramsey/uuid/pull/164)

## 3.6.0

_Released: 2017-03-18_

  * Add `InvalidUuidStringException`, thrown when attempting to decode an invalid string UUID; this does not introduce any BC issues, since the new exception inherits from the previously used `InvalidArgumentException` [#162](https://github.com/ramsey/uuid/pull/162)
  * Improve memory usage when generating large quantities of UUIDs (use `str_pad()` and `dechex()` instead of `sprintf()`) [#160](https://github.com/ramsey/uuid/pull/160)
  * Minor test and documentation updates

## 3.5.2

_Released: 2016-11-22_

  * Improved test coverage.

## 3.5.1

_Released: 2016-10-02_

  * Fixed issue where same UUIDs were not treated as equal with mixed case ([#131](https://github.com/ramsey/uuid/issues/131), [#137](https://github.com/ramsey/uuid/pull/137)).
  * Test cleanup.

## 3.5.0

_Released: 2016-08-02_

  * Add `OrderedTimeCodec` to store UUID in an optimized way for InnoDB ([#117](https://github.com/ramsey/uuid/issues/117), [#118](https://github.com/ramsey/uuid/pull/118)).
  * Fixed `RandomNodeProvider` to prevent invalid node generation ([#129](https://github.com/ramsey/uuid/pull/129)).
  * Cache failed attempt to retrieve system node to avoid multiple system calls ([#107](https://github.com/ramsey/uuid/issues/107), [#121](https://github.com/ramsey/uuid/pull/121)).
  * Various test improvements.

## 3.4.1

_Released: 2016-04-23_

  * Fixed test that violated a PHP CodeSniffer rule, breaking the build.

## 3.4.0

_Released: 2016-04-23_

  * Add `TimestampFirstCombCodec` and `TimestampLastCombCodec` codecs.
  * Improve logic of `CombGenerator` for COMB sequential UUIDs.
  * Significantly improved test coverage.

## 3.3.0

_Released: 2016-03-22_

  * Drop the use of OpenSSL as a fallback and use [paragonie/random_compat][] to support RandomBytesGenerator in versions of PHP earlier than 7.0. This addresses and fixes the [collision issue][].
  * Improved test coverage.
  * Update code to conduct to version 1.4 of the Contributor Covenant.

## 3.2.0

_Released: 2016-02-17_

  * Add random generator option for use for the PECL libsodium extension.
  * Updates to test infrastructure.

## 3.1.0

_Released: 2015-12-17_

  * Uuid objects now may be properly serialized/unserialized.
  * Update build environments for testing on Travis CI.

## 3.0.1

_Released: 2015-10-21_

  * Add project [Contributor Code of Conduct](https://github.com/ramsey/uuid/blob/master/CONDUCT.md)
  * Modify Travis CI builds to run tests on multiple CPU architectures
  * Clean up code, tests, and documentation

## 3.0.0

_Released: 2015-09-28_

The 3.0.0 release represents a significant step for the ramsey/uuid library. While the simple and familiar API used in previous versions remains intact, this release provides greater flexibility to integrators, including the ability to inject your own number generators, UUID codecs, node and time providers, and more.

  * BREAK: The root namespace for this package has changed from "Rhumsaa" to "Ramsey." In most cases, simply making this change in your applications is the only upgrade path you will need. Everything else should work as expected.
  * BREAK: The UUID [Doctrine field type](http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html) has been moved to [ramsey/uuid-doctrine](https://github.com/ramsey/uuid-doctrine).
  * BREAK: The `uuid` console application has been moved to [ramsey/uuid-console](https://github.com/ramsey/uuid-console).
  * BREAK: The `Uuid::VERSION` package version constant has been removed.
  * See also the release notes for [3.0.0-alpha1][300-alpha1], [3.0.0-alpha2][300-alpha2], [3.0.0-alpha3][300-alpha3], and [3.0.0-beta1][300-beta1].

[300-alpha1]: https://github.com/ramsey/uuid/blob/master/CHANGELOG.md#300-alpha1
[300-alpha2]: https://github.com/ramsey/uuid/blob/master/CHANGELOG.md#300-alpha2
[300-alpha3]: https://github.com/ramsey/uuid/blob/master/CHANGELOG.md#300-alpha3
[300-beta1]: https://github.com/ramsey/uuid/blob/master/CHANGELOG.md#300-beta1

## 3.0.0-beta1

_Released: 2015-08-31_

  * Improve GUID support to ensure that:
    * On little endian (LE) architectures, the byte order of the first three fields is LE.
    * On big endian (BE) architectures, it is the same as a GUID.
    * String representation is always the same.
  * Fix exception message for `DegradedNumberConverter::fromHex()`.
  * Add Scrutinizer configuration to run code-quality builds through Scrutinizer.
  * Auto-fix Scrutinizer issues.
  * Fix support URLs in composer.json to point to the correct GitHub repository.

## 3.0.0-alpha3

_Released: 2015-07-28_

  * Time generator improvements:
    * Enabled use of custom TimeGenerator implementations.
      * BREAK: Removed now unnecessary `timeConverter` and `timeProvider` properties, setters, and getters in both `FeatureSet` and `UuidFactory` as those are now exclusively used by the default `TimeGenerator`.
      * Added a `setTimeGenerator` method on `UuidFactory` to override the default time generator.
    * Add option to enable `PeclUuidTimeGenerator` via `FeatureSet`.

## 3.0.0-alpha2

_Released: 2015-07-28_

  * BREAK: Removed `PeclUuidFactory` in favor of using pecl-uuid with generators.
  * NEW: Refactored time-based (version 1) UUIDs into a `TimeGeneratorInterface` to allow for other sources to generate version 1 UUIDs in this library.
  * NEW: Added `PeclUuidTimeGenerator` and `PeclUuidRandomGenerator` for creating version 1 or version 4 UUIDs using the pecl-uuid extension.
  * NEW: Add `RandomBytesGenerator` for use with PHP 7. ramsey/uuid will default to use this generator when running on PHP 7.
  * `RandomLibAdapter` now defaults to a medium-strength generator with [ircmaxell/random-lib](https://github.com/ircmaxell/RandomLib). This is configurable, so other generator strengths may be used.
  * Migrated to the Travis CI container-based infrastructure for builds.
  * Documentation updates and corrections.

## 3.0.0-alpha1

_Released: 2015-07-16_

  * BREAK: The root namespace for this package has changed from "Rhumsaa" to "Ramsey." In most cases, simply making this change in your applications is the only upgrade path you will need. Everything else should work as expected.
  * BREAK: The UUID [Doctrine field type](http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html) has been moved to [ramsey/uuid-doctrine](https://github.com/ramsey/uuid-doctrine).
  * BREAK: The `uuid` console application has been moved to [ramsey/uuid-console](https://github.com/ramsey/uuid-console).
  * BREAK: The `Uuid::VERSION` package version constant has been removed.
  * NEW: The `Uuid` class is no longer marked as `final`. Everything is now based around interfaces and factories, allowing you to use this package as a base to implement other kinds of UUIDs with different dependencies.
  * NEW: Through setting dependencies on `UuidFactory` and/or extending `FeatureSet`, you may override any package defaults, injecting your own dependencies.
  * NEW: For random number generation, in addition to `OpenSslGenerator` (used if `openssl_random_pseudo_bytes()` is present) and the fallback `MtRandGenerator`, you may use the bundled `CombGenerator` for sequential UUIDs or the `RandomLibAdapter` if using [ircmaxell/random-lib](https://github.com/ircmaxell/RandomLib).
  * NEW: In addition to the default UUID generation, this library also supports GUID generation by configuring a `FeatureSet` to use GUIDs.
  * NEW: While the interface to create UUIDs hasn't changed, if using this package on a 32-bit system, you will now receive an object of type `DegradedUuid` (which extends `Uuid`, which implements `UuidInterface`).
  * NEW: All UUIDs are now [JsonSerializable](http://php.net/JsonSerializable).

## 2.9.0

_Released: 2016-03-22_

  * Drop support for OpenSSL in favor of [paragonie/random_compat][]. This addresses and fixes the [collision issue][].

## 2.8.4

_Released: 2015-12-17_

  * Add support for symfony/console v3.
  * Update build matrix to run Travis CI tests on PHP 7 & with lowest package versions.

## 2.8.3

_Released: 2015-08-31_

  * Fix exception message in `Uuid::calculateUuidTime()`.
  * Update composer.json to reflect new repository and package name.

## 2.8.2

_Released: 2015-07-23_

  * Ensure the release tag makes it into the rhumsaa/uuid package.
  * Minor documentation changes.

## 2.8.1

_Released: 2015-06-16_

  * Use `passthru()` and output buffering in `getIfconfig()`.
  * Cache the system node in a static variable so that we process it only once per runtime.
  * Set ramsey/uuid as a replacement for rhumsaa/uuid in composer.json.
  * Documentation updates and corrections.

## 2.8.0

_Released: 2014-11-09_

  * Added static `fromInteger()` method to create UUIDs from string integer or `\Moontoast\Math\BigNumber`.
  * Friendlier Doctrine conversion to Uuid or string.
  * Documentation fixes.

## 2.7.4

_Released: 2014-10-29_

  * Changed loop in `generateBytes()` from `foreach` to `for`; see #33
  * Use `toString()` in README examples to avoid confusion
  * Exclude build/development tools from releases using .gitattributes
  * Set timezone properly for tests

## 2.7.3

_Released: 2014-08-27_

  * Fixed upper range for `mt_rand` used in version 4 UUIDs

## 2.7.2

_Released: 2014-07-28_

  * Upgraded to PSR-4 autoloading
  * Testing upgrades:
    * Testing against PHP 5.6
    * Testing with PHPUnit 4
    * Using Coveralls.io to generate code coverage reports
  * Documentation fixes

## 2.7.1

_Released: 2014-02-19_

  * Moved moontoast/math and symfony/console to require-dev; fixes #20
  * Now supporting symfony/console for 2.3 (LTS version); fixes #21
  * Updated tests to run even when dev packages are not installed (skips tests if requirements are not met)

## 2.7.0

_Released: 2014-01-31_

  * Moved UUID validation regex pattern into constant for external use (`Uuid::VALID_PATTERN`)

## 2.6.1

_Released: 2014-01-27_

  * Fixed bug where `uuid` console application could not find the Composer autoloader when installed in another project

## 2.6.0

_Released: 2014-01-17_

  * Introduced `uuid` console application for generating and decoding UUIDs from CLI (run `./bin/uuid` for details)
  * Added `Uuid::getInteger()` to retrieve a Moontoast\Math\BigNumber representation of the 128-bit integer representing the UUID
  * Added `Uuid::getHex()` to retrieve the hexadecimal representation of the UUID
  * Now using netstat on Linux to capture the node for a version 1 UUID
  * Now requiring Moontoast\Math as part of the regular package requirements, not just the dev requirements

## 2.5.0

_Released: 2013-10-30_

  * Using `openssl_random_pseudo_bytes()`, if available, to generate random bytes, by merging in PR #15 from @dfreudenberger
  * Fixed test for Rhumsaa\Uuid\Doctrine\UuidType, by merging in PR #17 from @dfreudenberger
  * Documentation fixes

## 2.4.0

_Released: 2013-07-29_

  * `Uuid::getVersion()` now returns null if the UUID isn't an RFC 4122 variant
  * `Uuid::fromString()` now supports a 128-bit integer formatted as a hexadecimal string (UUID without dashes)
  * Tests have been greatly enhanced, borrowing from the Python UUID library

## 2.3.0

_Released: 2013-07-16_

  * Added `Uuid::fromBytes()` by merging in PR #14 from @asm89

## 2.2.0

_Released: 2013-07-04_

  * Added `Doctrine\UuidType::requiresSQLCommentHint()` method by merging in PR #13 from @zerrvox
  * Removed `"minimum-stability": "dev"` from composer.json

## 2.1.2

_Released: 2013-07-03_

  * @ericthelin found cases where the system node was coming back with uppercase hexadecimal digits; this ensures that case in the node is converted to lowercase

## 2.1.1

_Released: 2013-04-29_

  * Fixed NIL bug in `Uuid::isValid()` method, reported by @ocubom in PR #11

## 2.1.0

_Released: 2013-04-15_

  * Added static `Uuid::isValid()` method for checking whether a string is a valid UUID

## 2.0.0

_Released: 2013-02-11_

  * Break: `Uuid` class is now marked as "final"
  * Break: `Uuid::getLeastSignificantBits()` no longer returns an integer on 64-bit platforms; it requires `moontoast/math`
  * Break: `Uuid::getMostSignificantBits()` no longer returns an integer on 64-bit platforms; it requires `moontoast/math`
  * Break: Moved `UnsupportedOperationException` to the `Exception` subnamespace
  * Added support for 32-bit platforms
  * Added generated API documentation to the repository

## 1.1.2

_Released: 2012-11-29_

  * Relaxed Doctrine type conversion rules

## 1.1.1

_Released: 2012-08-27_

  * Removed `final` keyword from `Uuid` class

## 1.1.0

_Released: 2012-08-06_

  * Added `Doctrine\UuidType` as a field mapping type for the Doctrine Database Abstraction Layer (DBAL)
  * Improved tests and code coverage

## 1.0.0

_Released: 2012-07-19_

  * Initial release


[paragonie/random_compat]: https://github.com/paragonie/random_compat
[collision issue]: https://github.com/ramsey/uuid/issues/80
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
