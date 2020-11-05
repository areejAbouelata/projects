<?php

namespace App\Repositories;

use App\Models\Client;
use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password'
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
        return Client::class;
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);
//        add type
        $model->type = 'client';
        $model->save();

        return $model;
    }

    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->where('type', 'client')->get($columns);
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);
        $projects = $model->projects()->get();
        foreach ($projects as $project) {
            $project->notes()->delete();
            $files = $project->files()->get();
            foreach ($files as $file) {
                Storage::has($file->name) ? Storage::delete($file->name) : '';
            }
            $project->files()->delete();
        }
        $model->projects()->delete();
        return $model->delete();
    }

}
