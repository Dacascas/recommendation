<?php
declare(strict_types=1);

namespace Download;

/**
 * Interface DownloadInterface
 * @package TestTask\Download
 */
interface DownloaderInterface
{
    /**
     * @param string $source
     * @return string
     */
    public function download(string $source): string;
}
