<?php
declare(strict_types=1);

namespace Download;

/**
 * Class DownloaderFactory
 * @package Download
 */
class DownloaderFactory
{
    /**
     * @param string $type
     * @return UriDownloader
     */
    public static function getDownloader(string $type)
    {
        switch ($type) {
            case 'http':
                return new UriDownloader();
        }

        throw new \InvalidArgumentException("Not exist downloader type");
    }
}
