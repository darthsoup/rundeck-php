<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * API Job
 */
class Job extends AbstractApi
{
    /**
     * @param string $project
     * @return Project[]
     */
    public function listJobs(string $project): array
    {
        $jobs = $this->adapter->get($this->api . '/project/' . $project. '/jobs');

        $jobs = json_decode($jobs);

        return array_map(function ($jobs) {
            return new Model\JobModel($jobs);
        }, $jobs);
    }

    /**
     * @param string $id
     * @return Model\JobMetadata
     */
    public function jobMetadata(string $id): Model\JobMetadata
    {
        $metadata = $this->adapter->get($this->api . '/job/' . $id . '/info');

        $metadata = json_decode($metadata);

        return new Model\JobMetadata($metadata);
    }
}
