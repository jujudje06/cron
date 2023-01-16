<?php

namespace Sid\Cron;

use Cron\CronExpression;
use DateTime;

class Job implements JobInterface
{
    /**
     * @var string
     */
    protected string $expression;

    /**
     * @var mixed
     */
    protected mixed $data;

    /**
     * @param string $expression
     * @param mixed $data
     */
    public function __construct(string $expression, mixed $data)
    {
        $this->expression = $expression;
        $this->data       = $data;
    }

    /**
     * @return string
     */
    public function getExpression() : string
    {
        return $this->expression;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime|null $datetime
     * @return bool
     */
    public function isDue(DateTime $datetime = null) : bool
    {
        $cronExpression = CronExpression::factory(
            $this->getExpression()
        );

        return $cronExpression->isDue($datetime);
    }
}
