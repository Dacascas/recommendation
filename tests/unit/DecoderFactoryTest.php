<?php

namespace Tests\Decode;

class DecoderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDecode()
    {
        $cut = $this->getCut();

        $result = $cut->getDecode('json');

        static::assertInstanceOf(\Decode\DecoderInterface::class, $result);
    }

    public function testGetDecodeWithException()
    {
        $cut = $this->getCut();
        $cut->getDecode('');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('No decoder');
    }

    public function getCut()
    {
        return new \Decode\DecoderFactory();
    }
}
