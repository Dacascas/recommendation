<?php

namespace Tests\Decode;

use TestTask\Decode\JsonFormatDecoder;

class JsonFormatDecoderTest extends \PHPUnit_Framework_TestCase
{

    public function testDecode()
    {
        $cut = $this->getCut();
        $result = $cut->decode('{"name":"test"}');

        static::assertEquals($result, ['name'=>'test']);
    }

    public function testDecodeWithException()
    {
        $cut = $this->getCut();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Could not decode JSON.');

        $cut->decode('{');
    }

    public function getCut()
    {
        return new JsonFormatDecoder();
    }
}
