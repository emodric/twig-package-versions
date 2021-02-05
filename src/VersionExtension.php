<?php

declare(strict_types=1);

namespace EdiModric\Twig;

use Jean85\PrettyVersions;
use Jean85\Version;
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
        return PrettyVersions::getVersion($packageName)->getFullVersion();
    }

    public function getPrettyPackageVersion(string $packageName): Version
    {
        return PrettyVersions::getVersion($packageName);
    }
}
