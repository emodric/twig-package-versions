Package Versions Twig extension
===============================

This package provides simple Twig functions that wrap [PackageVersions](https://github.com/ocramius/PackageVersions)
lib by [Marco Pivetta](https://github.com/ocramius) and [PrettyPackageVersions](https://github.com/Jean85/pretty-package-versions)
lib by [Alessandro Lai](https://github.com/Jean85) making it possible to output version strings of your libraries
directly inside your Twig templates.

## Installation

To install this extension, use Composer:

    composer require emodric/twig-package-versions

## Using the extension

In PHP:

```php
$twig = new Twig_Environment($loader, $options);

$twig->addExtension(new EdiModric\Twig\VersionExtension());
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

* `package_version('my-vendor/package-name')` - Returns the package version string as returned by `PackageVersions\Versions::getVersion` method
* `pretty_package_version('my-vendor/package-name')` - Returns the `Jean85\Version` object as returned by `Jean85\PrettyVersions::getVersion` method
