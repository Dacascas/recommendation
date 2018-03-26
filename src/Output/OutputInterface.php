<?php
declare(strict_types=1);

namespace TestTask\Output;

/**
 * Interface OutputInterface
 * @package Output
 */
interface OutputInterface
{
    /**
     * @param array $dataToShow
     */
    public function printOut(array $dataToShow): void;
}
