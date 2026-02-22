<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all()
    {
        $projects = Project::with('techStacks')->orderBy('created_at', 'desc')->get();

        $result = $projects->map(function ($project) {
            return [
                'title' => $project->title,
                'description' => $project->description,
                'url' => $project->url,
                'github_link' => $project->github_link,
                'web_view_image' => $project->web_view_image,
                'mobile_view_image' => $project->mobile_view_image,
                'show' => $project->show,
                'tech_stacks' => $project->techStacks->map(function ($techStack) {
                    return [
                        'id' => $techStack->id,
                        'name' => $techStack->name,
                        'icon' => $techStack->icon,
                    ];
                })
            ];
        });

        return $result;
    }

    public function find(int $id)
    {
        return Project::findOrFail($id);
    }
}
