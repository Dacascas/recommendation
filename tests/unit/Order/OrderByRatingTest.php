<?php

namespace Tests\Order;

use TestTask\Order\OrderByRating;

class OrderByRatingTest extends \PHPUnit_Framework_TestCase
{
    public function testOrderEmpty()
    {
        $cut = $this->getCut();
        $result = $cut->order([]);

        static::assertEmpty($result);
    }

    public function testOrder()
    {
        $cut = $this->getCut();
        $result = $cut->order([['rating' => 10], ['rating' => 20]]);

        static::assertEquals([['rating' => 20], ['rating' => 10]], $result);
    }

    public function getCut()
    {
        return new OrderByRating();
    }
}
