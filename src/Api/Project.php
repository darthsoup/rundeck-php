<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * API Project
 */
class Project extends AbstractApi
{
    /**
     * List the existing projects on the server.
     *
     * @link http://rundeck.org/docs/api/#listing-projects
     * @return Model\Project[]
     */
    public function all()
    {
        $output = $this->adapter->get($this->api . '/projects');

        $projects = json_decode($output);

        return array_map(function ($projects) {
            return new Model\Project($projects);
        }, $projects);
    }

    /**
     * Get information about a project.
     *
     * @link http://rundeck.org/docs/api/#getting-project-info
     * @param string $project
     * @return Model\Project
     */
    public function info(string $project)
    {
        $output = $this->adapter->get($this->api . '/project/' . $project);

        $project = json_decode($output);

        return new Model\Project(json_decode($project));
    }

    /**
     * Retrieve or modify the project configuration data. Requires configure authorization for the project.
     *
     * @link http://rundeck.org/docs/api/#project-configuration
     * @param string $project
     * @return Model\ProjectConfiguration
     */
    public function config(string $project)
    {
        $output = $this->adapter->get($this->api . '/project/' . $project . '/config');

        $projectConfirguration = json_decode($output);
        
        return new Model\ProjectConfiguration($projectConfirguration);
    }
}
