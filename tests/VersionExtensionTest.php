<?php

declare(strict_types=1);

namespace EdiModric\Twig\Tests;

use EdiModric\Twig\VersionExtension;
use Jean85\Version;
use PackageVersions\Versions;
use PHPUnit\Framework\TestCase;

final class VersionExtensionTest extends TestCase
{
    /**
     * @var \EdiModric\Twig\VersionExtension
     */
    private $versionExtension;

    public function setUp(): void
    {
        $this->versionExtension = new VersionExtension();
    }

    public function testGetPackageVersion(): void
    {
        $version = $this->versionExtension->getPackageVersion('emodric/twig-package-versions');

        $this->assertNotEmpty($version);
    }

    /**
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage Required package "emodric/unknown" is not installed: cannot detect its version
     */
    public function testGetPackageVersionThrowsOutOfBoundsExtension(): void
    {
        $this->versionExtension->getPackageVersion('emodric/unknown');
    }

    public function testGetPrettyPackageVersion(): void
    {
        $version = $this->versionExtension->getPrettyPackageVersion('emodric/twig-package-versions');

        $this->assertInstanceOf(Version::class, $version);
    }

    /**
     * @expectedException \OutOfBoundsException
     * @expectedExceptionMessage Required package "emodric/unknown" is not installed: cannot detect its version
     */
    public function testGetPrettyPackageVersionThrowsOutOfBoundsExtension(): void
    {
        $this->versionExtension->getPrettyPackageVersion('emodric/unknown');
    }
}
