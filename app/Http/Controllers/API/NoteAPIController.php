<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNoteAPIRequest;
use App\Http\Requests\API\UpdateNoteAPIRequest;
use App\Models\Note;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NoteController
 * @package App\Http\Controllers\API
 */

class NoteAPIController extends AppBaseController
{
    /** @var  NoteRepository */
    private $noteRepository;

    public function __construct(NoteRepository $noteRepo)
    {
        $this->noteRepository = $noteRepo;
    }

    /**
     * Display a listing of the Note.
     * GET|HEAD /notes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $notes = $this->noteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $notes->toArray(),
            __('messages.retrieved', ['model' => __('models/notes.plural')])
        );
    }

    /**
     * Store a newly created Note in storage.
     * POST /notes
     *
     * @param CreateNoteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNoteAPIRequest $request)
    {
        $input = $request->all();

        $note = $this->noteRepository->create($input);

        return $this->sendResponse(
            $note->toArray(),
            __('messages.saved', ['model' => __('models/notes.singular')])
        );
    }

    /**
     * Display the specified Note.
     * GET|HEAD /notes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Note $note */
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/notes.singular')])
            );
        }

        return $this->sendResponse(
            $note->toArray(),
            __('messages.retrieved', ['model' => __('models/notes.singular')])
        );
    }

    /**
     * Update the specified Note in storage.
     * PUT/PATCH /notes/{id}
     *
     * @param int $id
     * @param UpdateNoteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Note $note */
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/notes.singular')])
            );
        }

        $note = $this->noteRepository->update($input, $id);

        return $this->sendResponse(
            $note->toArray(),
            __('messages.updated', ['model' => __('models/notes.singular')])
        );
    }

    /**
     * Remove the specified Note from storage.
     * DELETE /notes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Note $note */
        $note = $this->noteRepository->find($id);

        if (empty($note)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/notes.singular')])
            );
        }

        $note->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/notes.singular')])
        );
    }
}
