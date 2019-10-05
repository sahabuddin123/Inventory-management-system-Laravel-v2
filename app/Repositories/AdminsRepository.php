<?php
namespace App\Repositories;
 
use App\Models\Admins;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AdminsContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class AdminsRepository extends BaseRepository implements AdminsContract
{
    use UploadAble;
    /**
     * AdminsRepository constructor.
     * @param Admins $model
     */
    public function __construct(Admins $model)
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
     * @return admin|mixed
     */
    public function createAdmins(array $params)
    {
        try {
            $collection = collect($params);
         
            $image = null;
     
            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'admin');
            }
            // else{
            //     $image = "no_image.png";
            // }
     
            $username = $params['username'];
            $password = bcrypt($params['password']);
            $email = $params['email'];
            $firstname = $params['firstname'];
            $lastname = $params['lastname'];
            $gender = $collection->has('gender') ? 1 : 0;

            
            $merge = $collection->merge(compact('username','email','password','firstname','lastname','gender','image'));
            $admin = new Admins($merge->all());
            $admin->save();
 
            return $admin;
 
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
        $admin = $this->findAdminsById($params['id']);
 
        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
 
            if ($admin->image != null) {
                $this->deleteOne($admin->image);
            }
     
            $image = $this->uploadOne($params['image'], 'admin');
        }
 
            $username = $params['username'];
            $password = bycript($params['password']);
            $email = $params['email'];
            $firstname = $params['firstname'];
            $lastname = $params['lastname'];
            $gender = $collection->has('gender') ? 1 : 0;

            $merge = $collection->merge(compact('username','email','password','firstname','lastname','gender','image'));
 
        $admin->update($merge->all());
 
        return $admin;
    }
 
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAdmins($id)
    {
        $admin = $this->findAdminsById($id);
        if ($admin->image != null) {
            $this->deleteOne($admin->image);
        }
        $admin->delete();
 
        return $admin;
    }
}