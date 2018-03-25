<?php
declare(strict_types=1);

namespace Decode;

/**
 * Class JsonFormatDecoder
 * @package Decode
 */
class JsonFormatDecoder implements DecoderInterface
{
    use \Logger\LoggerTrait;

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

            case JSON_ERROR_SYNTAX:
                throw new \InvalidArgumentException('Could not decode JSON, syntax error - malformed JSON.');

            case JSON_ERROR_DEPTH:
                throw new \InvalidArgumentException('Could not decode JSON, maximum stack depth exceeded.');

            case JSON_ERROR_STATE_MISMATCH:
                throw new \InvalidArgumentException('Could not decode JSON, underflow or the nodes mismatch.');

            case JSON_ERROR_CTRL_CHAR:
                throw new \InvalidArgumentException('Could not decode JSON, unexpected control character found.');

            case JSON_ERROR_UTF8:
                throw new \InvalidArgumentException(
                    'Could not decode JSON, malformed UTF-8 characters (incorrectly encoded?)'
                );

            default:
                throw new \InvalidArgumentException('Could not decode JSON.');
        }
    }
}
