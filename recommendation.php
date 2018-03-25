<?php
declare(strict_types=1);

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    include_once __DIR__ . '/src/' . $className . '.php';
});

/** config for application in associate array */
$config = require_once(__DIR__ . '/config/' . getenv('ENV') . '.php');

$logger = \Logger\Logger::getInstance();
$logger->setApplyLogger($config['logger']);

try {
    $sourceData = [];

    /** multiply source possible with schema - http and format - json of the source data */
    foreach ($config['movie_sources'] as $movie_source) {
        $parsedData = \Decode\DecoderFactory::getDecode($movie_source['format'])->decode(
            \Download\DownloaderFactory::getDownloader($movie_source['uri']['schema'])
                ->download($movie_source['uri']['host'])
        );

        $sourceData = \array_merge($sourceData, $parsedData);
    }

    /** in case if no exist data */
    if (empty($sourceData)) {
        echo 'no data received';
    }

    /** search with particular search algorithm and particular input data parser */
    $searchResult = (new \Search\SearchManager(
        new \Search\SearchLogicByGenreTime,
        new \Input\InputDataCommandLine()
    ))->searchByCriteria($sourceData);

    /** ordering mechanism */
    $searchResult = (new \Order\OrderByRating())->order($searchResult);

    /** output mechanism */
    (new \Output\OutputManager(new \Output\OutputCommandLineStrategy()))->showResult($searchResult);
} catch (\Throwable $e) {
    echo $e->getMessage();
}
