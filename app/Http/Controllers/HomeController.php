<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Interfaces\RoleInterface;

class HomeController extends Controller
{
    protected $roleInterface;
    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    public function dashboard() {

        $user = \Auth::user();
/*         $role = Role::where('slug', 'editor')->first();
        $user->roles()->attach($role); */

       // dd($user->hasRole('author'));
        //dd($user->roles);


/*         $permission = Permission::first();
        $user->permissions()->attach($permission); */

        //dd($user->can('add-post'));
        return view('admin/dashboard');
    }

    public function roles() {

        $roles = $this->roleInterface->getRoles();
        return view('admin/roles/list', compact('roles'));
    }

    public function createRole() {
        $modules = $this->roleInterface->getModules();

        return view('admin/roles/create', compact('modules'));
    }
}
