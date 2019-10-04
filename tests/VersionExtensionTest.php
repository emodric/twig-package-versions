<?php

declare(strict_types=1);

namespace EdiModric\Twig\Tests;

use EdiModric\Twig\VersionExtension;
use Jean85\Version;
use PackageVersions\Versions;
use PHPUnit\Framework\TestCase;
use OutOfBoundsException;
use Twig\TwigFunction;

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

    /**
     * @covers \EdiModric\Twig\VersionExtension::getFunctions
     */
    public function testGetFunctions(): void
    {
        $functions = $this->versionExtension->getFunctions();

        $this->assertNotEmpty($functions);
        $this->assertContainsOnlyInstancesOf(TwigFunction::class, $functions);
    }

    /**
     * @covers \EdiModric\Twig\VersionExtension::getPackageVersion
     */
    public function testGetPackageVersion(): void
    {
        $version = $this->versionExtension->getPackageVersion('emodric/twig-package-versions');

        $this->assertNotEmpty($version);
    }

    /**
     * @covers \EdiModric\Twig\VersionExtension::getPackageVersion
     */
    public function testGetPackageVersionThrowsOutOfBoundsExtension(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageMatches('/Required package "emodric\/unknown" is not installed/');

        $this->versionExtension->getPackageVersion('emodric/unknown');
    }

    /**
     * @covers \EdiModric\Twig\VersionExtension::getPrettyPackageVersion
     */
    public function testGetPrettyPackageVersion(): void
    {
        $version = $this->versionExtension->getPrettyPackageVersion('emodric/twig-package-versions');

        $this->assertInstanceOf(Version::class, $version);
    }

    /**
     * @covers \EdiModric\Twig\VersionExtension::getPrettyPackageVersion
     */
    public function testGetPrettyPackageVersionThrowsOutOfBoundsExtension(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageMatches('/Required package "emodric\/unknown" is not installed/');

        $this->versionExtension->getPrettyPackageVersion('emodric/unknown');
    }
}
