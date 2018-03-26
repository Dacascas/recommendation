<?php

namespace Tests\Input;

use TestTask\Input\InputDataCommandLine;

class InputDataCommandLineTest extends \PHPUnit_Framework_TestCase
{
    public function testGetInputData()
    {
        $_SERVER['argv'][] = 1;
        $_SERVER['argv'][] = 'test=1';
        $_SERVER['argv'][] = 'test2=2';

        $cut = $this->getCut();
        $result = $cut->getInputData();

        static::assertInternalType('array', $result);
        static::assertArraySubset(['test' => 1, 'test2' => 2], $result);
    }

    public function getCut()
    {
        return new InputDataCommandLine();
    }
}
