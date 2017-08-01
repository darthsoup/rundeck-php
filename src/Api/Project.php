<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model\Project as ProjectModel;

/**
 * API Project
 */
class Project extends AbstractApi
{
    /**
     * @return Project[]
     */
    public function projects()
    {
        $projects = $this->adapter->get($this->api . '/projects');

        $projects = json_decode($projects);

        return array_map(function ($projects) {
            return new ProjectModel($projects);
        }, $projects);
    }

    /**
     * @param string $project
     * @return ProjectModel
     */
    public function project(string $project)
    {
        $project = $this->adapter->get($this->api . '/project/' . $project);

        return new ProjectModel(json_decode($project));
    }
}
