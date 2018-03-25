<?php
declare(strict_types=1);

namespace Decode;

/**
 * Class DecoderFactory
 * @package Decode
 */
class DecoderFactory
{
    /**
     * @param string $format
     * @return JsonFormatDecoder
     */
    public static function getDecode(string $format)
    {
        switch ($format) {
            case 'json':
                return new JsonFormatDecoder();
        }

        throw new \InvalidArgumentException("No decoder");
    }
}
