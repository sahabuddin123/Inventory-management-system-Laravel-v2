<?php
namespace App\Contracts;
 
interface GroupsContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
 
    /**
     * @param int $id
     * @return mixed
     */
    public function findGroupsById(int $id);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function createGroups(array $params);
 
    /**
     * @param array $params
     * @return mixed
     */
    public function updateGroups(array $params);
 
    /**
     * @param $id
     * @return bool
     */
    public function deleteGroups($id);
}