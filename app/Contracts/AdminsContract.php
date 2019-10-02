<?php
namespace App\Contracts;
 
interface AdminsContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAdmins(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findAdminsById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createAdmins(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateAdmins(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteAdmins($id);
}