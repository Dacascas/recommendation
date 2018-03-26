<?php

namespace Tests\Decode;

use TestTask\Decode\DecoderFactory;
use TestTask\Decode\DecoderInterface;

class DecoderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDecode()
    {
        $cut = $this->getCut();

        $result = $cut->getDecode('json');

        static::assertInstanceOf(DecoderInterface::class, $result);
    }

    public function testGetDecodeWithException()
    {
        $cut = $this->getCut();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('No decoder');

        $cut->getDecode('');
    }

    public function getCut()
    {
        return new DecoderFactory();
    }
}
