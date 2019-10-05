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
 /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    
     
    public function profile($id)
    {    
        $admin = $this->adminsRepository->findAdminsById($id);
        //$admins = $this->adminRepository->listAdmin();
        $this->setPageTitle('Profile', 'View Admin : '.$admin->name);
        return view('admin.admins.profile', compact('admin'));
    }
    public function edit($id)
    {
        $admin = $this->adminsRepository->findAdminsById($id);
        //$permissions = unserialize($this->targetgroup['permissions']);
        $adminget = $this->adminsRepository->listAdmins();
    
        $this->setPageTitle('Admin', 'Edit Admin : '.$admin->name);
        return view('admin.admins.edit', compact('adminget', 'admin'));
    }
   /**
    * update
    */
    public function update(Request $request)
    {
        $this->validate($request, [
            'username'      =>  'required|max:191',
            'email'         =>  'required|email',
            'firstname'     =>  'required|max:20',
            'lastname'      =>  'required|max:20',
            'gender'        =>  'required',
            'image'         =>  'required|max:5000'
        ]);
    
        $params = $request->except('_token');
    
        $admin = $this->adminsRepository->updateAdmins($params);
    
        if (!$admin) {
            return $this->responseRedirectBack('Error occurred while updating Admins ', 'error', true, true);
        }
        return $this->responseRedirect('admin.admins.index' ,'Admins updated successfully' ,'success',false, false);
    }


    public function delete($id)
{
    $admin = $this->adminsRepository->deleteAdmins($id);
 
    if (!$admin) {
        return $this->responseRedirectBack('Error occurred while deleting admin.', 'error', true, true);
    }
    return $this->responseRedirect('admin.admins.index','admin deleted successfully' ,'success',false, false);
}

}
