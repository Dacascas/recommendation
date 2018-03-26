<?php
declare(strict_types=1);

namespace TestTask\Search;

/**
 * Interface SearchLogicInterface
 */
interface SearchLogicInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function search(array $data): array;

    /**
     * @param array $inputData
     * @return mixed
     */
    public function setInputData(array $inputData): void;
}
