<?php
declare(strict_types=1);

namespace Decode;

/**
 * Interface DecoderInterface
 * @package TestTask\Decode
 */
interface DecoderInterface
{
    /**
     * @param string $data
     * @return array
     */
    public function decode(string $data): array;
}
