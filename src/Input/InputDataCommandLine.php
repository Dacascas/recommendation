<?php
declare(strict_types=1);

namespace TestTask\Input;

use TestTask\Logger\LoggerTrait;

/**
 * Class InputData
 */
class InputDataCommandLine implements InputInterface
{
    use LoggerTrait;

    /**
     * Method to get Input data from different source
     * @return array
     */
    public function getInputData(): array
    {
        $result = [];

        if ($this->isInputTypeCommandLine()) {
            $result = $this->getCommandLineInputData();
        }

        return $result;
    }

    /**
     * in this place we can extend type of input type
     * @return bool
     */
    private function isInputTypeCommandLine(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    private function getCommandLineInputData(): array
    {
        $argv = $_SERVER['argv'];
        unset($argv[0]);

        parse_str(\implode('&', $argv), $result);

        $this->log(__CLASS__ . ' - success');

        return $result;
    }
}
