<?php
declare(strict_types=1);

namespace Output;

class OutputCommandLineStrategy implements OutputInterface
{
    use \Logger\LoggerTrait;

    /**
     * {@inheritdoc}
     */
    public function printOut(array $dataToShow): void
    {
        $this->log(__CLASS__ . ' - success');

        foreach ($dataToShow as $showItem) {
            printf(
                "%s showing at %s\n",
                $showItem['name'],
                (new \DateTime($showItem['showing']))->format('ga')
            );
        }
    }
}