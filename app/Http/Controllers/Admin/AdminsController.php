<?php

namespace App\Http\Controllers\Admin;

//use App\Models\Admin;
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
            'username'              =>  'required|max:191',
            'password'              =>  'required|min:6',
            'email'                 =>  'required',
            'firstname'             =>  'required',
            'lastname'              =>  'required',
            'gender'                =>  'required',
            'image'                 =>  'max:1000'
            
        ]);
            
        $params = $request->except('_token');//;
    //return view('admin.admins.test', compact('params'));
        $admin = $this->adminsRepository->createAdmins($params);
    
        if (!$admin) {
            return $this->responseRedirectBack('Error occurred while creating admin.', 'error', true, true);
        }
        return $this->responseRedirect('admin.admins.index', 'admin added successfully' ,'success',false, false);
    }
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
    $groups = $this->adminsRepository->deleteAdmins($id);
 
    if (!$groups) {
        return $this->responseRedirectBack('Error occurred while deleting groups.', 'error', true, true);
    }
    return $this->responseRedirect('groups deleted successfully' ,'success',false, false);
}

}
