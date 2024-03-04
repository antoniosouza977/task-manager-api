<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectsRepository extends Repository
{
    protected string $model_class = Project::class;

}