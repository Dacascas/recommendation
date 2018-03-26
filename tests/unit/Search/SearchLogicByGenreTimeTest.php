<?php

namespace Tests\Search;

use TestTask\Search\SearchLogicByGenreTime;

class SearchLogicByGenreTimeTest extends \PHPUnit_Framework_TestCase
{
    public function testSetInputData()
    {
        $cut = $this->getCut();
        $cut->setInputData(['genre'=>'test', 'time'=>'12:00']);

        static::assertAttributeContains('test', 'genre', $cut);
        static::assertAttributeInstanceOf(\DateTime::class, 'downTime', $cut);
        static::assertAttributeInstanceOf(\DateTime::class, 'upTime', $cut);
    }

    public function testSetInputDataEmptyInput()
    {
        $cut = $this->getCut();
        $cut->setInputData([]);

        static::assertAttributeEmpty( 'genre', $cut);
        static::assertAttributeInstanceOf(\DateTime::class, 'downTime', $cut);
        static::assertAttributeInstanceOf(\DateTime::class, 'upTime', $cut);
    }

    public function testSearch()
    {
        $data = [
            [
                'name' => 'test1',
                'genres'=>[
                    'test1'
                ],
                'showings' => [
                    '7:10:00+11:00'
                ]
            ],
            [
                'name' => 'test2',
                'genres'=>[
                    'test2'
                ],
                'showing' => [
                    '7:20:00+11:00'
                ]
            ],
        ];
        $cut = $this->getCut();
        $cut->setInputData(['genre'=>'test1', 'time'=>'7:00:00+11:00']);
        $cut->search($data);
    }

    public function getCut()
    {
        return new SearchLogicByGenreTime();
    }
}
