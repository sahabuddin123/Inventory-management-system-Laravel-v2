<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins;
use App\Models\Groups;
use App\Models\AdminGroup;
use Illuminate\Http\Request;
use App\Contracts\AdminsContract;
use App\Http\Controllers\BaseController;

class AdminsController extends BaseController
{

    protected $adminsRepository;
 
    public function __construct(AdminsContract $adminsRepository)
    {
        $this->adminsRepository = $adminsRepository;
    }
    /* 
	* It redirects to the manage group page
	* As well as the group data is also been passed to display on the view page
	*/
    public function index()
    {
        $admin = $this->adminsRepository->listAdmins();
    
        $this->setPageTitle('Admin', 'List of all Admin');
        return view('admin.admins.index', compact('admin'));
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
        return view('admin.admins.combination')->with(['admin'  => $admin ,'groups'  => $groups]);
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
    /**
     * create
     */
    public function create()
    {
        // $group = $this->adminsRepository->findAdminsById($id);
        $admin = $this->adminsRepository->listAdmins('id', 'asc');
        // $groups = Groups::orderBy('name','asc')->get();
        $this->setPageTitle('Admins', 'Create Admins');
        return view('admin.admins.create', compact('admin'));//->with(['groups'  => $groups])
    }
    /**
     * store
     */
     public function store(Request $request)
    {
        $this->validate($request, [
            'username'      =>  'required|max:191',
            'email'         =>  'required|email',
            'password'      =>  'required|min:6',
            'firstname'     =>  'required|max:20',
            'lastname'      =>  'required|max:20',
            'gender'        =>  'required',
            'image'         =>  'max:5000'
        ]);
    
        $params = $request->except('_token');
    
        $admin = $this->adminsRepository->createAdmins($params);
    
        if (!$admin) {
            return $this->responseRedirectBack('Error occurred while creating admin.', 'error', true, true);
        }
        return $this->responseRedirect('admin.admins.index', 'Admin added successfully' ,'success',false, false);
    }
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'username'              =>  'required|max:191',
    //         'password'              =>  'required|min:6',
    //         'email'                 =>  'required',
    //         'firstname'             =>  'required',
    //         'lastname'              =>  'required',
    //         'gender'                =>  'required',
    //         'image'                 =>  'max:1000'
            
    //     ]);
            
    //     $params = $request->except('_token');//;
    // //return view('admin.admins.test', compact('params'));
    //     $admin = $this->adminsRepository->createAdmins($params);
    
    //     if (!$admin) {
    //         return $this->responseRedirectBack('Error occurred while creating admin.', 'error', true, true);
    //     }
    //     return $this->responseRedirect('admin.admins.index', 'admin added successfully' ,'success',false, false);
    // }
    /**
     * edit
     */

    public function edit($id)
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
    public function update(Request $request)
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


    public function delete($id)
{
    $admin = $this->adminsRepository->deleteAdmins($id);
 
    if (!$admin) {
        return $this->responseRedirectBack('Error occurred while deleting admin.', 'error', true, true);
    }
    return $this->responseRedirect('admin deleted successfully' ,'success',false, false);
}

}
