<?php
namespace App\Repositories;
 
use App\Models\Groups;
use App\Contracts\GroupsContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
class GroupsRepository extends BaseRepository implements GroupsContract
{
    /**
     * GroupsRepository constructor.
     * @param Groups $model
     */
    public function __construct(Groups $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
 
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
 
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findGroupsById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
 
        } catch (ModelNotFoundException $e) {
 
            throw new ModelNotFoundException($e);
        }
 
    }
 
    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createGroups(array $params)
    {
        try {
            $collection = collect($params);
 
            // $is_filterable = $collection->has('is_filterable') ? 1 : 0;
            // $is_required = $collection->has('is_required') ? 1 : 0;
 
            $merge = $collection->merge(compact('', ''));
 
            $groups = new Groups($merge->all());
 
            $groups->save();
 
            return $groups;
 
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateGroups(array $params)
    {
        $groups = $this->findGroupsById($params['id']);
 
        $collection = collect($params)->except('_token');
 
        //$is_filterable = $collection->has('is_filterable') ? 1 : 0;
        //$is_required = $collection->has('is_required') ? 1 : 0;
 
        $merge = $collection->merge(compact('', ''));
 
        $groups->update($merge->all());
 
        return $groups;
    }
 
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteGroups($id)
    {
        $groups = $this->findGroupsById($id);
 
        $groups->delete();
 
        return $groups;
    }
}