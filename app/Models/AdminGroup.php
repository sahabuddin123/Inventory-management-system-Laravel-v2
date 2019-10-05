<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table = 'admin_group';
    protected $fillable = ['admin_id','group_id'];

    public function listGroups(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Models\Groups','group_id');
    }

    /**
     * @return object
     */
    public function listUser(){
        return $this->belongsTo('App\Models\Admins','admin_id');
    }
}
