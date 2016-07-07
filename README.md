# icalreader

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Test Coverage][ico-codeclimate-coverage]][link-codeclimate-coverage]
[![Code Climate][ico-codeclimate-quality]][link-codeclimate-quality]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## License

This ics-parser is under MIT License. You may use it for your own sites for free, 
but I would like to get a notice when you use it (info@martin-thoma.de). If you 
use it for another software project, please state the information / links to 
this project in the files.

It is hosted at https://github.com/MartinThoma/ics-parser/ and the PEAR coding 
standard is used.

It was modified by John Grogg to properly handle recurring events (specifically 
with regards to Microsoft Exchange).

It was later modified by Ariel Vallese to be easily integrated to Laravel with 
through the Service Provider and support services.

Tests have been written and a code refactor is planned to take place.

## Install

Via Composer

``` bash
$ composer require timegridio/icalreader
```

Add the Service Provider:

    Timegridio\ICalReader\ICalReaderServiceProvider::class,

## Usage

    $icalevents = app()->make('ical');

    $icalevents->loadUrl('http://example.org/calendar.ics');

    $busy = $this->icalevents->isBusy(Carbon::parse('2016-07-06 10:30'));

    // true|false

[Checkout the tests](tests/unit/) to find more examples.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email alariva@timegrid.io instead of using the issue tracker.

## Credits

- [Martin Thoma](https://github.com/MartinThoma)
- [John Grogg](https://github.com/johngrogg)
- [Ariel Vallese][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/timegridio/icalreader.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/timegridio/icalreader/master.svg?style=flat-square
[ico-codeclimate-coverage]: https://codeclimate.com/github/timegridio/icalreader/badges/coverage.svg?style=flat-square
[ico-codeclimate-quality]: https://codeclimate.com/github/timegridio/icalreader/badges/gpa.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/timegridio/icalreader.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/timegridio/icalreader.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/timegridio/icalreader.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/timegridio/icalreader
[link-travis]: https://travis-ci.org/timegridio/icalreader
[link-codeclimate-coverage]: https://codeclimate.com/github/timegridio/icalreader/coverage
[link-codeclimate-quality]: https://codeclimate.com/github/timegridio/icalreader
[link-scrutinizer]: https://scrutinizer-ci.com/g/timegridio/icalreader/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/timegridio/icalreader
[link-downloads]: https://packagist.org/packages/timegridio/icalreader
[link-author]: https://github.com/alariva
[link-contributors]: ../../contributors
