<?php

namespace Tests\Output;

use TestTask\Output\OutputInterface;
use TestTask\Output\OutputManager;

class OutputManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OutputInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $outputMock;

    public function setUp()
    {
        $this->outputMock = $this->createMock(OutputInterface::class);
    }

    public function testShowResult()
    {
        $this->outputMock->expects(static::once())
            ->method('printOut')
            ->with([]);

        $this->getCut()->showResult([]);
    }

    public function getCut()
    {
        return new OutputManager($this->outputMock);
    }
}
