<?php
declare(strict_types=1);

namespace TestTask\Search;

use TestTask\Input\InputInterface;
use TestTask\Search\SearchLogicInterface;

/**
 * Class SearchManager
 * @package Search
 */
class SearchManager
{
    /**
     * @var SearchLogicInterface
     */
    private $searchLogic;

    /**
     * SearchManager constructor.
     * @param SearchLogicInterface $searchLogic
     */
    public function __construct(SearchLogicInterface $searchLogic, InputInterface $inputData)
    {
        $this->searchLogic = $searchLogic;
        $this->searchLogic->setInputData($inputData->getInputData());
    }

    /**
     * @param array $data
     * @return array
     */
    public function searchByCriteria(array $data): array
    {
        return $this->searchLogic->search($data);
    }
}
