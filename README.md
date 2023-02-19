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

You can publish the config file with:

```bash
php artisan vendor:publish --tag="measures-for-laravel-config"
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

It's possible to use also extended fluent methods: 

```php

$measure = Length::from("2.0m");
echo $measures->toCentimeters(); // 200 cm

//you can chain the methods: 

echo  Length::from("2.0m")->toCentimeters(); // 200 cm
```

If you do not know which kind of measure you are dealing with, you can use the `Measures` class to 
automatically detect the type of measure:

```php

$measure = Measures::from("2.0m"); // $measure is an instance of Length
echo $measures->toCm(); // 200 cm

$measure = Measures::from("2.0Kg"); // $measure is an instance of Weight
echo $measures->toG(); // 2000 g
```

## Eloquent cast

It's possible to cast a model attribute to a measure:

```php

use \Sfolador\Measures\Unit\Weight\Weight;
use Sfolador\Measures\Cast\Measure;

class Product extends Model
{
    protected $casts = [
        'weight' => Measure::class,
        'length'   => Measure::class,
    ];
}

$product = Product::first();
echo $product->weight->toKg(); // 2 Kg
echo $product->length->toCm(); // 200 cm


$product->weight = Weight::from("3.0Kg");
$product->length = Length::from("1.0m");

$product->save();
echo $product->weight->toKg(); // 3 Kg
echo $product->length->toCm(); // 100 cm

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

### Area

- Square meter
- Square kilometer
- Square centimeter
- Square millimeter
- Square inch
- Square foot
- Square yard
- Square mile
- Acre
- Hectare

### Data

- Bit
- Byte
- Kilobit
- Kilobyte
- Megabit
- Megabyte
- Gigabit
- Gigabyte
- Terabit
- Terabyte
- Petabit
- Petabyte
- kibibit
- kibibyte
- mebibit
- mebibyte
- gibibit
- gibibyte
- tebibit
- tebibyte
- pebibit
- pebibyte

### Speed

- Meter per second
- Kilometer per hour
- Mile per hour
- Knot
- Foot per second
- Mach

### Time

- Nanosecond
- Microsecond
- Millisecond
- Second
- Minute
- Hour
- Day
- Week
- Month
- Year

### Pressure

- Pascal
- Kilopascal
- Bar
- Millibar
- Atmosphere
- Torr
- Pound per square inch
- Millimeter of mercury

### Energy

- Joule
- Kilojoule
- Megajoule
- Gigajoule
- Watt hour
- Kilowatt hour
- Megawatt hour
- Gigawatt hour
- Calorie
- Kilocalorie
- Megacalorie
- Gigacalorie
- Electronvolt
- Kiloelectronvolt
- Megaelectronvolt
- Gigaelectronvolt

### Angle

- Degree
- Radian


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
