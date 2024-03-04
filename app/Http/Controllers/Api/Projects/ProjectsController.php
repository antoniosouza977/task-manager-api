<?php

namespace App\Http\Controllers\Api\Projects;

use App\Http\Requests\Projects\StoreProjectRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Models\Project;
use App\Repositories\ProjectsRepository;
use App\Services\GitHub;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProjectsController
{
    private ProjectsRepository $repository;
    private string $git_hub_url = 'https://api.github.com';
    private array $basic_relations = ['authors'];

    public function __construct(ProjectsRepository $projectsRepository)
    {
        $this->repository = $projectsRepository;
    }

    public function index(): JsonResponse
    {
        $user = Auth::user();

        return response()->json($user->projects()->with($this->basic_relations)->get());
    }

    public function show(Project $project): JsonResponse
    {
        $project->load($this->basic_relations);

        return response()->json($project);

    }

    public function update(Project $project, UpdateProjectRequest $request): JsonResponse
    {
        if ($this->ownerCheck($project)) {

            if (isset($request['authors'])) {
                $project->authors()->sync($request['authors']);
            }
            $project->load($this->basic_relations);

            return response()->json($this->repository->update($project, $request->all()));
        }

        return response()->json(['message' => 'Usuário ' . Auth::user()->name . ' não é autor do projeto.']);
    }

    public function store(StoreProjectRequest $request): JsonResponse
    {
        $github_project_repo = $this->getRepo($request);

        if (empty($github_project_repo)) {
            return response()->json(['message' => 'Repositório não encontrado no GitHub'], 404);
        }

        $project_data = [
            'title' => $github_project_repo['name'],
            'description' => $github_project_repo['description'],
            'owner' => $github_project_repo['owner']['login'],
            'git_hub_url' => $github_project_repo['html_url']
        ];

        $project = $this->repository->store($project_data);
        $project->authors()->sync($request['authors']);

        return response()->json($project);

    }

    public function destroy(Project $project): JsonResponse
    {
        if ($this->ownerCheck($project)) {
            $project->authors()->sync([]);
            $project->delete();

            return response()->json(['message' => 'Registro deletado com sucesso!']);
        }

        return response()->json(['message' => 'Usuário ' . Auth::user()->name . ' não é autor do projeto.']);
    }

    private function getRepo($request)
    {
        $repo_url = $request['git_hub_url'];
        $author_repo = substr($repo_url, GitHub::$URL_LENGTH);
        $response = Http::get($this->git_hub_url . '/repos/' . $author_repo);

        if ($response->clientError()) {
            return [];
        }

        return json_decode($response->body(), true);
    }

    public function ownerCheck($project): bool
    {
        $user = Auth::user();
        $project->load('authors');

        return $project->authors->contains($user);
    }

}