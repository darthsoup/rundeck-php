<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * API Job
 */
class Job extends AbstractApi
{
    /**
     * List the jobs that exist for a project.
     *
     * @link http://rundeck.org/docs/api/#listing-jobs
     * @param string $project
     * @return Model\Job[]
     */
    public function getJobs(string $project): array
    {
        $output = $this->adapter->get($this->api . '/project/' . $project. '/jobs');

        $jobs = json_decode($output, true);

        return array_map(function ($jobs) {
            return new Model\Job($jobs);
        }, $jobs);
    }

    /**
     * Run a job specified by ID.
     *
     * @link http://rundeck.org/docs/api/#running-a-job
     * @param string $id
     * @param array $options
     * @return Model\Execution
     */
    public function runJob(string $id, array $options = []): Model\Execution
    {
        $output = $this->adapter->post($this->api . '/job/' . $id . '/run', $options);

        $execution = json_decode($output, true);

        return new Model\Execution($execution);
    }

    /**
     * Get metadata about a specific job.
     *
     * @link http://rundeck.org/docs/api/#get-job-metadata
     * @param string $id
     * @return Model\JobMetadata
     */
    public function jobMetadata(string $id): Model\JobMetadata
    {
        $output = $this->adapter->get($this->api . '/job/' . $id . '/info');

        $metadata = json_decode($output, true);

        return new Model\JobMetadata($metadata);
    }
}
