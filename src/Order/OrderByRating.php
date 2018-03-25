<?php
declare(strict_types=1);

namespace Order;

/**
 * Class OrderByRating
 */
class OrderByRating implements OrderInterface
{
    use \Logger\LoggerTrait;

    /**
     * {@inheritdoc}
     */
    public function order(array $data): array
    {
        if (\count($data) > 1) {
            \array_multisort(\array_column($data, 'rating'), SORT_DESC, $data);
        }

        $this->log(__CLASS__ . ' - success');

        return $data;
    }
}
