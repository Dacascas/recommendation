<?php
declare(strict_types=1);

namespace TestTask\Order;

/**
 * Interface OrderInterface
 * @package Order
 */
interface OrderInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function order(array $data): array;
}
