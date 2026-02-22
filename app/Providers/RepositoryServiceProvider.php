<?php

namespace App\Providers;

use App\Repositories\CertificateRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\Interfaces\CertificateRepositoryInterface;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;
use App\Repositories\Interfaces\ProfileRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\TechRepositoryInterface;
use App\Repositories\ProfileRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TechRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CertificateRepositoryInterface::class, CertificateRepository::class);
        $this->app->bind(TechRepositoryInterface::class, TechRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
    }
}
