<?php

namespace Tests\Download;

use TestTask\Download\DownloaderFactory;
use TestTask\Download\DownloaderInterface;

class DownloaderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDownloader()
    {
        $cut = $this->getCut();
        $result = $cut->getDownloader('http');

        static::assertInstanceOf(DownloaderInterface::class, $result);
    }

    public function testGetDownloaderWithException()
    {
        $cut = $this->getCut();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Not exist downloader type');

        $cut->getDownloader('');
    }

    public function getCut()
    {
        return new DownloaderFactory();
    }
}
