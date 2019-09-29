<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\GroupsContract;

class GroupsController extends BaseController
{
    protected $groupsRepository;
 
    public function __construct(GroupsContract $groupsRepository)
    {
        $this->groupsRepository = $groupsRepository;
    }
    /* 
	* It redirects to the manage group page
	* As well as the group data is also been passed to display on the view page
	*/
    public function index()
    {
        $groups = $this->groupsRepository->listGroups();
    
        $this->setPageTitle('Groups', 'List of all groups');
        return view('admin.groups.index', compact('groups'));
    }

}
