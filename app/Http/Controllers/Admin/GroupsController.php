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
    /**
     * create
     */
    public function create()
    {
        $groups = $this->groupsRepository->listGroups('id', 'asc');
    
        $this->setPageTitle('groups', 'Create groups');
        return view('admin.groups.create', compact('groups'));
    }
    /**
     * store
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                 =>  'required|max:191',
            'slug'                  => 'required|max:191',
            'permissions'           =>  'required'
        ]);
    
        $params = $request->except('_token');
    
        $groups = $this->groupsRepository->createGroups($params);
    
        if (!$groups) {
            return $this->responseRedirectBack('Error occurred while creating groups.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index', 'groups added successfully' ,'success',false, false);
    }
    /**
     * edit
     */

    public function edit($id)
    {
        $targetgroup = $this->groupsRepository->findGroupsById($id);
        $groups = $this->groupsRepository->listGroups();
    
        $this->setPageTitle('Groups', 'Edit Groups : '.$targetgroup->name);
        return view('admin.groups.edit', compact('groups', 'targetgroup'));
    }
   /**
    * update
    */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'                 =>  'required|max:191',
            'slug'                  => 'required|max:191',
            'permissions'           =>  'required'
        ]);
    
        $params = $request->except('_token');
    
        $groups = $this->groupsRepository->createGroups($params);
    
        if (!$groups) {
            return $this->responseRedirectBack('Error occurred while updating groups.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index' ,'groups updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $groups = $this->groupsRepository->deleteGroups($id);
 
    if (!$groups) {
        return $this->responseRedirectBack('Error occurred while deleting groups.', 'error', true, true);
    }
    return $this->responseRedirect('groups deleted successfully' ,'success',false, false);
}

}
