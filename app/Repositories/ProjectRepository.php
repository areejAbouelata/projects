<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProjectRepository
 * @package App\Repositories
 * @version November 2, 2020, 3:11 pm UTC
 */
class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'payment_status',
        'phone_number',
        'price',
        'start_date',
        'payment_updated_by',
        'client_id'
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
        return Project::class;
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);
        $model->payment_updated_by = 0;
        $model->save();

        return $model;
    }

    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);


        if ($input['payment_status'] != $model->payment_status || $input['price'] != $model->price) {

            $model->payment_updated_by = auth()->user()->id;
            $model->save();
        }
        $model->fill($input);

        $model->save();

        return $model;
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

//        notes
        $notes = $model->notes()->get();
        foreach ($notes as $note) {
            $note->delete();
        }
        $files = $model->files()->get();
        foreach ($files as $file) {
            Storage::has($file->name) ? Storage::delete($file->name) : '';
            $file->delete();
        }

        return $model->delete();
    }
}
