<?php
namespace App\Contracts;
 
interface UserGroupContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listUGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findUGroupsById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createUGroups(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateUGroups(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteUGroups($id);
}