<?php
declare(strict_types=1);

namespace TestTask\Output;

/**
 * Class OutputManager
 * @package Output
 */
class OutputManager
{
    /**
     * @var OutputInterface
     */
    private $outputStrategy;

    /**
     * OutputManager constructor.
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        $this->outputStrategy = $output;
    }

    /**
     * @return mixed
     */
    public function showResult(array $dataToShow): void
    {
        $this->outputStrategy->printOut($dataToShow);
    }
}
