<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use App\Interfaces\RoleInterface;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    protected $userInterface;
    protected $roleInterface;
    public function __construct(UserInterface $userInterface, RoleInterface $roleInterface)
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
    }

    public function users() {
        $users = $this->userInterface->getUsers();
        return view('admin.users.list', compact('users'));
    }

    public function userCreate() {
        $roles = $this->roleInterface->getRoles();
        return view('admin.users.create', compact('roles'));
    }

    public function userStore(UserStoreRequest $request) {
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $fileName);
    
        $data = [
            'name' => $request->address,
            'email' => $request->district,
            'password' => $request->town,
        ];

        $createBranch = $this->userInterface->createUser($data);

        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }
}
