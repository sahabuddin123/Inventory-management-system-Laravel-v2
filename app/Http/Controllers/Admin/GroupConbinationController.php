<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins;
use App\Models\Groups;
use App\Models\AdminGroup;
use Illuminate\Http\Request;
use App\Contracts\UserGroupContract;
use App\Http\Controllers\BaseController;
use DB;

class GroupConbinationController extends BaseController
{

    protected $groupsRepository;
 
    public function __construct(UserGroupContract $groupsRepository)
    {
        $this->groupsRepository = $groupsRepository;
    }
    /* 
	* It redirects to the manage group page
	* As well as the group data is also been passed to display on the view page
	*/
    public function indexCombination()
    {
        $admin = $this->groupsRepository->listUGroups();
    
        $this->setPageTitle('User Groups', 'List of all User Groups');
        return view('admin.groupcombination.indexCombination', compact('admin'));
    }
   
    /**
     * user
     * and
     * groups
     * combination
     */
    public function combination()
    {
        
        $admin = Admins::orderBy('username','asc')->get();
        $groups = Groups::orderBy('name','asc')->get();
        $this->setPageTitle('User Group', 'Manage User Group Combination');
        return view('admin.groupcombination.combination')->with(['admin'  => $admin ,'groups'  => $groups]);
    }
    /**
     * store 
     * user
     * group
     * combination
     */
    public function storeCombination(Request $request)
    {
        $this->validate($request, [
            'admin_id'  => 'required',
            'group_id'  => 'required'
        ]);
        $params = $request->except('_token');

            $admin_id = $params['admin_id'];
            $group_id = $params['group_id'];

            $adminGroup = AdminGroup::create([
                'admin_id'   => $admin_id,
                'group_id'   => $group_id,
            ]);

        if (!$adminGroup) {
                return $this->responseRedirectBack('Error occurred while creating User Groups.', 'error', true, true);
            }
        return $this->responseRedirect('admin.admins.index', 'User Groups added successfully' ,'success',false, false);
    }
    

    public function editCombination($id)
    {
        $targetgroup = $this->adminsRepository->findAdminsById($id);
        //$permissions = unserialize($this->targetgroup['permissions']);
        $groups = $this->adminsRepository->listGroups();
    
        $this->setPageTitle('Groups', 'Edit Groups : '.$targetgroup->name);
        return view('admin.groups.edit', compact('groups', 'targetgroup'));
    }
   /**
    * update
    */
    public function updateCombination(Request $request)
    {
        $this->validate($request, [
            'name'                 =>  'required|max:191',
            'slug'                  => 'required|max:191',
            'permissions'           =>  'required'
        ]);
    
        $params = $request->except('_token');
    
        $groups = $this->adminsRepository->updateAdmins($params);
    
        if (!$groups) {
            return $this->responseRedirectBack('Error occurred while updating groups.', 'error', true, true);
        }
        return $this->responseRedirect('admin.groups.index' ,'groups updated successfully' ,'success',false, false);
    }


    public function deleteCombination($id)
{
    $admin = $this->adminsRepository->deleteAdmins($id);
 
    if (!$admin) {
        return $this->responseRedirectBack('Error occurred while deleting admin.', 'error', true, true);
    }
    return $this->responseRedirect('admin deleted successfully' ,'success',false, false);
}

}
