<?php

declare(strict_types=1);

namespace Edi\Twig;

use Jean85\PrettyVersions;
use Jean85\Version;
use PackageVersions\Versions;
use RuntimeException;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class VersionExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'package_version',
                [$this, 'getPackageVersion']
            ),
            new TwigFunction(
                'pretty_package_version',
                [$this, 'getPrettyPackageVersion']
            ),
        ];
    }

    public function getPackageVersion(string $packageName): string
    {
        return Versions::getVersion($packageName);
    }

    public function getPrettyPackageVersion(string $packageName): Version
    {
        if (!class_exists(PrettyVersions::class)) {
            throw new RuntimeException('jean85/pretty-package-versions library is needed to use pretty_package_version Twig function.');
        }

        return PrettyVersions::getVersion($packageName);
    }
}
