Package Versions Twig extension
===============================

This package provides simple Twig functions that wrap [PrettyPackageVersions](https://github.com/Jean85/pretty-package-versions)
lib by [Alessandro Lai](https://github.com/Jean85) making it possible to output version strings of your libraries
directly inside your Twig templates.

Initially, this Twig extension was submitted as a [pull request](https://github.com/twigphp/Twig-extensions/pull/226) against
official [Twig Extensions](https://github.com/twigphp/Twig-extensions) collection, but was turned into a separate package since
no new features are accepted over there.

## Installation

To install this extension, use Composer:

    composer require emodric/twig-package-versions

## Using the extension

In PHP:

```php
$twig = new \Twig\Environment($loader, $options);

$twig->addExtension(new \EdiModric\Twig\VersionExtension());
```

In a Symfony project, you can register the extension as a service:

```yaml
services:
    twig.extension.version:
        class: EdiModric\Twig\VersionExtension
        tags:
            - { name: twig.extension }
```

Once set up, you can use the following Twig functions:

* `package_version('my-vendor/package-name')` - Returns the full package version string
* `pretty_package_version('my-vendor/package-name')` - Returns pretty package version string
