<?php

namespace App\Http\Controllers;

use App\DataTables\NoteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Repositories\NoteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NoteController extends AppBaseController
{
    /** @var  NoteRepository */
    private $noteRepository;

    public function __construct(NoteRepository $noteRepo)
    {
        $this->middleware('permission:note-list|note-create|note-edit|note-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:note-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:note-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:note-delete', ['only' => ['destroy']]);
        $this->noteRepository = $noteRepo;
    }

    /**
     * Display a listing of the Note.
     *
     * @param NoteDataTable $noteDataTable
     * @return Response
     */
    public function index(NoteDataTable $noteDataTable)
    {
        return $noteDataTable->render('admin.notes.index');
    }

    /**
     * Show the form for creating a new Note.
     *
     * @return Response
     */
    public function create($id)
    {
        return view('admin.notes.create' , compact('id'));
    }

    /**
     * Store a newly created Note in storage.
     *
     * @param CreateNoteRequest $request
     *
     * @return Response
     */
    public function store(CreateNoteRequest $request)
    {
        $input = $request->all();

        $note = $this->noteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/notes.singular')]));

        return redirect(route('project.notes' , [$request->project_id])  );
    }

    /**
     * Display the specified Note.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            Flash::error(__('models/notes.singular').' '.__('messages.not_found'));

            return redirect(route('admin.notes.index'));
        }

        return view('admin.notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified Note.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            Flash::error(__('messages.not_found', ['model' => __('models/notes.singular')]));

            return redirect(route('admin.notes.index'));
        }

        return view('admin.notes.edit')->with('note', $note);
    }

    /**
     * Update the specified Note in storage.
     *
     * @param  int              $id
     * @param UpdateNoteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoteRequest $request)
    {
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            Flash::error(__('messages.not_found', ['model' => __('models/notes.singular')]));

            return redirect(route('admin.notes.index'));
        }

        $note = $this->noteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/notes.singular')]));

        return redirect(route('admin.notes.index'));
    }

    /**
     * Remove the specified Note from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            Flash::error(__('messages.not_found', ['model' => __('models/notes.singular')]));

            return redirect(route('admin.notes.index'));
        }

        $this->noteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/notes.singular')]));

        return redirect(route('admin.notes.index'));
    }
}
