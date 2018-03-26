<?php
declare(strict_types=1);

namespace TestTask\Decode;

use TestTask\Logger\LoggerTrait;

/**
 * Class JsonFormatDecoder
 * @package Decode
 */
class JsonFormatDecoder implements DecoderInterface
{
    use LoggerTrait;

    /**
     * {@inheritdoc}
     *  @throws \InvalidArgumentException
     */
    public function decode(string $data): array
    {
        $decoded = \json_decode($data, true);

        switch (\json_last_error()) {
            case JSON_ERROR_NONE:
                $this->log(__CLASS__ . ' - success');
                return $decoded;

            default:
                throw new \InvalidArgumentException('Could not decode JSON.');
        }
    }
}
