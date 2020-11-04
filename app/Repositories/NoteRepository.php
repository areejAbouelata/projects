<?php

namespace App\Repositories;

use App\Models\Note;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class NoteRepository
 * @package App\Repositories
 * @version November 2, 2020, 3:58 pm UTC
 */
class NoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'note',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Note::class;
    }

    public function create($input)
    {

        $model = $this->model->newInstance($input);
        $model->user_id= Auth::user()->id;

        $model->save();
        return $model;
    }

}
