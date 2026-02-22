<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;

class ExperienceRepository implements ExperienceRepositoryInterface
{
    public function all()
    {
        $experiences = Experience::with('techStacks')->with('jobDescs')->orderBy('created_at', 'desc')->get();

        $result = $experiences->map(function ($experience) {
            return [
                'id' => $experience->id,
                'title' => $experience->title,
                'company' => $experience->company,
                'description' => $experience->description,
                'location' => $experience->location,
                'website' => $experience->website,
                'logo' => $experience->logo,
                'start_date' => $experience->start_date,
                'end_date' => $experience->end_date,
                'tech_stacks' => $experience->techStacks->map(function ($techStack) {
                    return [
                        'id' => $techStack->id,
                        'name' => $techStack->name,
                        'icon' => $techStack->icon,
                    ];
                }),
                'job_descs' => $experience->jobDescs->map(function ($jobDesc) {
                    return [
                        'id' => $jobDesc->id,
                        'title' => $jobDesc->title,
                        'description' => $jobDesc->description,
                    ];
                })
            ];
        });

        return $result;
    }

    public function find(int $id)
    {
        return Experience::findOrFail($id);
    }
}
