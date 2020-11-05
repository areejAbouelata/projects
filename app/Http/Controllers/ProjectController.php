<?php

namespace App\Http\Controllers;

use App\DataTables\NoteDataTable;
use App\DataTables\ProjectDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProjectController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:project-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the Project.
     *
     * @param ProjectDataTable $projectDataTable
     * @return Response
     */
    public function index(ProjectDataTable $projectDataTable)
    {
        return $projectDataTable->render('admin.projects.index');
    }

    /**
     * Show the form for creating a new Project.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param CreateProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/projects.singular')]));

        return redirect(route('create.file', [$project->id]));
    }

    /**
     * Display the specified Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error(__('models/projects.singular') . ' ' . __('messages.not_found'));

            return redirect(route('admin.projects.index'));
        }

        return view('admin.projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error(__('messages.not_found', ['model' => __('models/projects.singular')]));

            return redirect(route('admin.projects.index'));
        }

        return view('admin.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified Project in storage.
     *
     * @param int $id
     * @param UpdateProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProjectRequest $request)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error(__('messages.not_found', ['model' => __('models/projects.singular')]));

            return redirect(route('admin.projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/projects.singular')]));
        return redirect(route('create.file', [$project->id]));


//        return redirect(route('admin.projects.index'));
    }

    /**
     * Remove the specified Project from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            Flash::error(__('messages.not_found', ['model' => __('models/projects.singular')]));

            return redirect(route('admin.projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/projects.singular')]));

        return redirect(route('admin.projects.index'));
    }

    public function notes(NoteDataTable $noteDataTable, $id)
    {
        $project = Project::findOrFail($id);
        return $noteDataTable->render('admin.notes.index');


    }
}
