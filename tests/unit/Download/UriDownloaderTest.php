<?php

namespace Tests\Download;

use TestTask\Download\UriDownloader;

class UriDownloaderTest extends \PHPUnit_Framework_TestCase
{
    public function testDownload()
    {
        $cut = $this->getCut();
        $result = $cut->download('https://pastebin.com/raw/cVyp3McN');

        static::assertInternalType('string', $result);
    }

    public function testGetDownloaderWithException()
    {
        $cut = $this->getCut();
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Some error occured');

        $cut->download('');
    }

    public function getCut()
    {
        return new UriDownloader();
    }
}
