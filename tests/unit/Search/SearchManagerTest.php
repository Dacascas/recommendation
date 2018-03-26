<?php

namespace Tests\Search;

use TestTask\Input\InputInterface;
use TestTask\Search\SearchLogicInterface;
use TestTask\Search\SearchManager;

class SearchManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SearchLogicInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $searchLogicMock;

    /**
     * @var InputInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $inputMock;

    public function setUp()
    {
        $this->searchLogicMock = $this->createMock(SearchLogicInterface::class);
        $this->inputMock = $this->createMock(InputInterface::class);
    }

    public function testSearchByCriteria()
    {
        $this->searchLogicMock->expects(static::once())
            ->method('search')
            ->with([]);

        $result = $this->getCut();
        $result->searchByCriteria([]);
    }

    public function getCut()
    {
        return new SearchManager($this->searchLogicMock, $this->inputMock);
    }
}
