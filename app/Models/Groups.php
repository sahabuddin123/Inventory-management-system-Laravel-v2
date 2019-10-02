<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    protected $fillable=[ 'name','slug','permissions'];

    public function admins()
    {
    	return $this->belongsToMany(App\Models\Admin::class,'group_admins');
    }

    public function hasAccess(array $permissions)
    {
       foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;
            }
       }
       return false;
    }

    protected function hasPermission(string $permission)
    {
    	$permissions= json_decode($this->permissions,true);
    	return $permissions[$permission]??false;
    }
    
}
