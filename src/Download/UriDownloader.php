<?php
declare(strict_types=1);

namespace TestTask\Download;

use TestTask\Logger\LoggerTrait;

/**
 * Class UriDownloader
 * @package Download
 */
class UriDownloader implements DownloaderInterface
{
    use LoggerTrait;

    /**
     * {@inheritdoc}
     * @throws \RuntimeException
     */
    public function download(string $source): string
    {
        try {
            $sourceData = \file_get_contents($source);

            if ($sourceData) {
                $this->log(__CLASS__ . ' - success');

                return $sourceData;
            }
        } catch (\Throwable $e) {
            throw new \RuntimeException('Some error occured');
        }

        throw new \RuntimeException('Not correct source');
    }
}
