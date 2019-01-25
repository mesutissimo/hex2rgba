<?php

declare(strict_types=1);

use App\ColorCodeConverter;
use PHPUnit\Framework\TestCase;

final class Hex2RGBATest extends TestCase

{

    public function testWithSharp3DigitSFloatAlpha()

    {
        $ccc = new ColorCodeConverter;
        $scene = $ccc->convertHex2RGBA('#FFF', 0.3);
        $ccc->setResult($scene);
        $this->assertEquals('rgba(255, 255, 255, 0.3)', $ccc->getResult());

    }

    public function testWithSharp6DigitIntegerAlpha()

    {
        $ccc = new ColorCodeConverter;
        $scene = $ccc->convertHex2RGBA('#FFFFFF', 1);
        $ccc->setResult($scene);
        $this->assertEquals('rgba(255, 255, 255, 1)', $ccc->getResult());

    }

    public function testWithoutSharp3DigitFloatAlpha()

    {
        $ccc = new ColorCodeConverter;
        $scene = $ccc->convertHex2RGBA('FFF', 0.5);
        $ccc->setResult($scene);
        $this->assertEquals('rgba(255, 255, 255, 0.5)', $ccc->getResult());

    }

    public function testWithoutSharp6DigitIntegerAlpha()

    {
        $ccc = new ColorCodeConverter;
        $scene = $ccc->convertHex2RGBA('FFFFFF', 1);
        $ccc->setResult($scene);
        $this->assertEquals('rgba(255, 255, 255, 1)', $ccc->getResult());

    }

    public function testWithoutSharp5DigitIntegerAlpha()

    {
        $ccc = new ColorCodeConverter;
        $scene = $ccc->convertHex2RGBA('FFFFF', 1);
        $ccc->setResult($scene);
        $this->assertEquals(99, $ccc->getResult());

    }

}