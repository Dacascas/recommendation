<?php
declare(strict_types=1);

namespace Download;

/**
 * Class UriDownloader
 * @package Download
 */
class UriDownloader implements DownloaderInterface
{
    use \Logger\LoggerTrait;

    /**
     * {@inheritdoc}
     * @throws \RuntimeException
     */
    public function download(string $source): string
    {
        $sourceData = \file_get_contents($source);

        if ($sourceData) {
            $this->log(__CLASS__ . ' - success');

            return $sourceData;
        }

        throw new \RuntimeException('Not correct source');
    }
}
