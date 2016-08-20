Square Matrix
====

This is a PHP library that intends to provide a fluent API to 
make handling [Square Matrix](https://en.wikipedia.org/wiki/Square_matrix) easier.

# Requirements
* PHP 5.5.9

# Installation
* Clone the repository
```bash
$ git clone git@github.com:trivialmatters/square-matrix.git
```
* Run [Composer](https://getcomposer.org/download/)
```bash
$ composer install --prefer-dist -o -vvv
```

# Tests
You can run tests using [PHPUnit](https://phpunit.de/):
```bash
$ vendor/bin/phpunit -c phpunit.xml.dist tests
```

# Usage
* Add library in your composer.json:
```bash
$ composer require trivialmatters/square-matrix
```

Use it:
```php
<?php

require_once __DIR__.'/vendor/autoload.php';

$squareMatrix = new Gkirtsou\SquareMatrix();
// ...
```

# Contributions
Want to contribute? Awesome! Please create an Issue in [Issue Tracker](https://github.com/trivialmatters/square-matrix/issues/new) to discuss about it,
and create a Pull Request with your changes. Don't forget to write tests! :)
