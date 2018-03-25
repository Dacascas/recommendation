<?php
declare(strict_types=1);

namespace Output;

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