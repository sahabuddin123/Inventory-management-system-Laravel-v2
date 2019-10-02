<?php
namespace App\Models;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Admin extends Authenticatable
{
    use Notifiable;
 
    protected $table = 'admins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'firstname', 'lastname', 'gender',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function groups()
    {
        return $this->belongsToMany(App\Models\Groups::class, 'group_admins');
    }


    public function hasAccess(array $permissions)
    {
       foreach($this->groups as $group){
            if($group->hasAccess($permissions)){
                return true;
            }
       }
       return false;
    }

    public function inGroup($groupeSlug)
    {
        return $this->groups()->where('slug',$groupSlug)->count()==1;
    }
}