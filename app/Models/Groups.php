<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    protected $fillable = ['group_name','permission'];

    
}
