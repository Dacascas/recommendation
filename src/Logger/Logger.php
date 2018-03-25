<?php
declare(strict_types=1);

namespace Logger;

/**
 * Trait LoggerTrait
 */
class Logger
{
    /**
     * @var bool
     */
    private $applyLogger = true;

    private static  $instance = null;

    /**
     * @param bool $apply
     * @return $this
     */
    public function setApplyLogger(bool $apply)
    {
        $this->applyLogger = $apply;
        return $this;
    }

    /**
     * @return Logger
     */
    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}
    private function __construct() {}

    /**
     * @param string $message
     */
    public function log(string $message = '')
    {
        if ($this->applyLogger) {
            print($message . "\n");
        }
    }
}