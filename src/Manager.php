<?php

namespace Sid\Cron;

use DateTime;

class Manager implements ManagerInterface
{
    /**
     * @var array
     */
    protected $jobs = [];

    /**
     * @param \Sid\Cron\JobInterface $job
     * @return void
     */
    public function add(JobInterface $job): void
    {
        $this->jobs[] = $job;
    }

    /**
     * @param \DateTime|null $now
     * @return array
     */
    public function getDueJobs(DateTime $now = null) : array
    {
        return array_filter(
            $this->jobs,
            function ($job) use ($now) {
                return $job->isDue($now);
            }
        );
    }

    /**
     * @return array
     */
    public function getAllJobs() : array
    {
        return $this->jobs;
    }
}
