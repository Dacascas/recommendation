<?php
declare(strict_types=1);

namespace TestTask\Search;

use TestTask\Logger\LoggerTrait;

/**
 * Class SearchLogicByGenreTime
 */
class SearchLogicByGenreTime implements SearchLogicInterface
{
    use LoggerTrait;

    /**
     * @var string
     */
    private $genre;

    /**
     * @var \DateTime|static
     */
    private $downTime;

    /**
     * @var \DateTime|static
     */
    private $upTime;

    /**
     * SearchLogicByGenreTime constructor.
     * @param array $criteria
     * @throws \Exception
     */
    public function setInputData(array $criteria): void
    {
        $this->genre = $criteria['genre'] ?? '';
        $this->downTime = isset($criteria['time']) ? new \DateTime($criteria['time']) : new \DateTime();
        $this->upTime = isset($criteria['time']) ?
            (new \DateTime($criteria['time']))->add(new \DateInterval('PT30M')) :
            new \DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function search(array $data): array
    {
        $this->log(__CLASS__ . ' - success');

        $result = [];

        foreach ($data as $item) {
            if (\in_array($this->genre, $item['genres'])) {
                foreach ($item['showings'] as $showing) {
                    $showTime = new \DateTime($showing);

                    if ($this->isShowTimeInTimeRange($showTime)) {
                        $item['showing'] = $showing;
                        $result[] = $item;

                        break;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * @param \DateTime $showTime
     * @return bool
     */
    private function isShowTimeInTimeRange(\DateTime $showTime): bool
    {
        return $showTime->getTimestamp() > $this->downTime->getTimestamp()
            && $showTime->getTimestamp() <= $this->upTime->getTimestamp();
    }
}
