<?php

declare(strict_types=1);

namespace EdiModric\Twig\Tests;

use EdiModric\Twig\VersionExtension;
use Jean85\Version;
use OutOfBoundsException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Twig\TwigFunction;

#[CoversClass(VersionExtension::class)]
final class VersionExtensionTest extends TestCase
{
    private VersionExtension $versionExtension;

    protected function setUp(): void
    {
        $this->versionExtension = new VersionExtension();
    }

    public function testGetFunctions(): void
    {
        $functions = $this->versionExtension->getFunctions();

        self::assertNotEmpty($functions);
        self::assertContainsOnlyInstancesOf(TwigFunction::class, $functions);
    }

    public function testGetPackageVersion(): void
    {
        $version = $this->versionExtension->getPackageVersion('emodric/twig-package-versions');

        self::assertNotEmpty($version);
    }

    public function testGetPackageVersionThrowsOutOfBoundsExtension(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageMatches('/(Required package|Package) "emodric\/unknown" is not installed/');

        $this->versionExtension->getPackageVersion('emodric/unknown');
    }

    public function testGetPrettyPackageVersion(): void
    {
        $version = $this->versionExtension->getPrettyPackageVersion('emodric/twig-package-versions');

        self::assertInstanceOf(Version::class, $version);
    }

    public function testGetPrettyPackageVersionThrowsOutOfBoundsExtension(): void
    {
        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessageMatches('/(Required package|Package) "emodric\/unknown" is not installed/');

        $this->versionExtension->getPrettyPackageVersion('emodric/unknown');
    }
}
