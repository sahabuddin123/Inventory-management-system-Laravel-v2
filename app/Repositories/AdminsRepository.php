<?php
namespace App\Repositories;
 
use App\Models\Admin;
use App\Models\AdminGroup;
use App\Contracts\AdminsContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
 
class AdminsRepository extends BaseRepository implements AdminsContract
{
    /**
     * AdminsRepository constructor.
     * @param Admins $model
     */
    public function __construct(Admin $model)
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
    public function listAdmins(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }
 
    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAdminsById(int $id)
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
    public function createAdmins(array $params)
    {
        try {
            $collection = collect($params);
            $picture = null;
 
            if ($collection->has('picture') && ($params['picture'] instanceof  UploadedFile)) {
                $picture = $this->uploadOne($params['picture'], 'admins');
            }
     
            
            $username = $params['username'];
            $password = bycript($params['password']);
            $email = $params['email'];
            $firstname = $params['firstname'];
            $lastname = $params['lastname'];
            $gender = $collection->has('gender') ? 1 : 0;

            $merge = $collection->merge(compact('username','password', 'email', 'firstname', 'lastname','gender','picture'));
            
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
    public function updateAdmins(array $params)
    {
        $groups = $this->findAdminsById($params['id']);
 
        $collection = collect($params)->except('_token');

        if ($collection->has('picture') && ($params['picture'] instanceof  UploadedFile)) {
 
            if ($category->picture != null) {
                $this->deleteOne($category->picture);
            }
     
            $picture = $this->uploadOne($params['picture'], 'admins');
        }
 
            $username = $params['username'];
            $password = bycript($params['password']);
            $email = $params['email'];
            $firstname = $params['firstname'];
            $lastname = $params['lastname'];
            $gender = $collection->has('gender') ? 1 : 0;

            $merge = $collection->merge(compact('username','password', 'email', 'firstname', 'lastname','gender','picture'));
 
        $groups->update($merge->all());
 
        return $groups;
    }
 
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAdmins($id)
    {
        $groups = $this->findAdminsById($id);
 
        $groups->delete();
 
        return $groups;
    }
}