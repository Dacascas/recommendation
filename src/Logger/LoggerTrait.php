<?php
declare(strict_types=1);

namespace TestTask\Logger;

/**
 * Trait LoggerTrait
 */
trait LoggerTrait
{
    /**
     * @param string $message
     */
    public function log(string $message = '')
    {
        (Logger::getInstance())->log($message);
    }
}
