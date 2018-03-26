<?php

namespace Tests\Output;

use TestTask\Output\OutputCommandLineStrategy;

class OutputCommandLineStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testPrintOut()
    {
        $testArray = [['name'=>'test', 'showing'=>'12:00']];
        $cut = $this->getCut();
        $cut->printOut($testArray);

        fwrite(STDOUT, print_r($testArray, TRUE));
    }

    public function getCut()
    {
        return new OutputCommandLineStrategy();
    }
}
