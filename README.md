<img src="https://banners.beyondco.de/Measures%20for%20Laravel.png?theme=light&packageManager=composer+require&packageName=sfolador%2Fmeasures-for-laravel&pattern=architect&style=style_1&description=Easily+convert+between+units+of+measure&md=1&showWatermark=1&fontSize=100px&images=calculator&widths=200&heights=auto" />

# A collection of unit conversions utils for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfolador/measures-for-laravel.svg?style=flat-square)](https://packagist.org/packages/sfolador/measures-for-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sfolador/measures-for-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sfolador/measures-for-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sfolador/measures-for-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sfolador/measures-for-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sfolador/measures-for-laravel.svg?style=flat-square)](https://packagist.org/packages/sfolador/measures-for-laravel)

Convert units of measure in Laravel.

## Installation

You can install the package via composer:

```bash
composer require sfolador/measures-for-laravel
```


## Usage

```php

use \Sfolador\Measures\Measures;
use  \Sfolador\Measures\Unit\Length\Length;
\Sfolador\Measures\Unit\Weight\Weight;

$measure = Measures::length("2.0m");
echo $measures->toCm(); // 200.0 cm

//or you can use the Length class directly

$length = Length::from("2.0m");
echo $length->toCm(); // 200.0 cm

$measure = Measures::weight("2.0Kg");
echo $measures->toG(); // 2000.0 g

//or you can use the Weight class directly

$length = Weight::from("2.0Kg");
echo $length->toG(); // 2000.0 g

```

## Available units

### Length

- Millimeter
- Centimeter
- Meter
- Kilometer
- Inch
- Foot
- Yard
- Mile
- Nautical mile

### Weight

- Milligram
- Gram
- Kilogram
- Ton
- Ounce
- Pound
- Stone
- Long ton
- Short ton

### Volume

- Milliliter
- Liter
- Cubic meter
- Cubic inch
- Cubic foot
- Gallon
- Pint
- Cup

### Temperature

- Celsius
- Fahrenheit
- Kelvin

## Todos

- [x] Add volume units
- [x] Add temperature units
- [x] Add area units
- [x] Add speed units
- [ ] Add time units
- [ ] Add pressure units
- [ ] Add energy units
- [ ] Add power units
- [ ] Add force units
- [ ] Add frequency units
- [ ] Add data units
- [ ] Add angle units
- [ ] Add acceleration units

## Testing

```bash
composer test
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [sfolador](https://github.com/sfolador)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
