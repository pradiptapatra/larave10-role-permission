<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use App\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface
{
    protected $roleModel;
    protected $moduleModel;
    public function __construct(Role $roleModel, Module $moduleModel)
    {
        $this->roleModel = $roleModel;
        $this->moduleModel = $moduleModel;
    }

    public function getRoles()
    {
        try {
            return $this->roleModel->all();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getRole($id)
    {
        try {
            return $this->roleModel->where('id', $id)->latest()->first();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getModules() {
        try {
            return $this->moduleModel->with(['permissions'])->get();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}