<?php
namespace App\Repositories;
 
use App\Models\AdminGroup;
use App\Contracts\UserGroupContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
class UserGroupRepository extends BaseRepository implements UserGroupContract
{
    /**
     * GroupsRepository constructor.
     * @param AdminGroup $model
     */
    public function __construct(AdminGroup $model)
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
    public function listUGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
 
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findUGroupsById(int $id)
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
    public function createUGroups(array $params)
    {
        try {
            $collection = collect($params);
 
            $name = $params['name'];
            $slug = $params['slug'];
            $permissions = serialize($params['permissions']);
            $merge = $collection->merge(compact('name','slug', 'permissions'));
 
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
    public function updateUGroups(array $params)
    {
        $groups = $this->findUGroupsById($params['id']);
 
        $collection = collect($params)->except('_token');
 
        $name = $params['name'];
        $slug = $params['slug'];
        $permissions = serialize($params['permissions']);
        $merge = $collection->merge(compact('name','slug', 'permissions'));
 
        $groups->update($merge->all());
 
        return $groups;
    }
 
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteUGroups($id)
    {
        $groups = $this->findUGroupsById($id);
 
        $groups->delete();
 
        return $groups;
    }
}