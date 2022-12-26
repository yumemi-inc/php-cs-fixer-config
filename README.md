# 🛠 yumemi-inc/php-cs-fixer-config
Strict, modern, and VCS friendly configuration for php-cs-fixer.

> **Warning**  
> This is not an official product of YUMEMI Inc.

## ✨ Features
- **Strict**: Protect your codebase in strict.
- **Modern**: Optimised for the modern PHP.
- **VCS Friendly**: What you need is what you get as diff.

## 📦 Installation
```shell
composer require --dev yumemi-inc/php-cs-fixer-config
```

Write your `.php-cs-fixer.php` to enable the configuration:

```php
<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use YumemiInc\PhpCsFixerConfig\Config;

return (new Config())
    ->setFinder(
        (new Finder())
            ->in(__DIR__),
    );
```

If you want to allow risky rules, set `$allowRisky` to true on the constructor:

```php
new Config(allowRisky: true)
```

## ✅ Versioning
Version x.y.z of this package will work on PHP x.y (e.g. 8.1.x works on PHP 8.1).
On the ruleset changes, the z number will be increased.

| Package Version | PHP Version | Maintained? |
|-----------------|-------------|-------------|
| 8.2.x           | ^8.2        | Yes         |
| 8.1.x           | ^8.1        | Yes         |

## 🙌 Contributing
Contributes of adding new rules or resolving conflicts with our other packages (
[phpcs-config](https://github.com/yumemi-inc/phpcs-config),
[php-intellij-profiles](https://github.com/yumemi-inc/php-intellij-profiles)
) are welcome.
Other contributions may not be accepted such as changing the existing rules or removing them.
