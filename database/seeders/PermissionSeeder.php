<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Module;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulePermission = [];
        $modules = Module::all();
        
        foreach($modules as $module) {
            if($module->name === 'role') {
                Permission::insert([
                    ['name'=>'Create Role','slug'=>'101', 'module_id'=> $module->id],
                    ['name'=>'Store Role','slug'=>'102', 'module_id'=> $module->id],
                    ['name'=>'Get Role','slug'=>'103', 'module_id'=> $module->id],
                    ['name'=>'Edit Role','slug'=>'104', 'module_id'=> $module->id],
                    ['name'=>'Update Role','slug'=>'105', 'module_id'=> $module->id],
                    ['name'=>'List Role','slug'=>'106', 'module_id'=> $module->id],
                    ['name'=>'Delete Role','slug'=>'107', 'module_id'=> $module->id],
                ]);
            } else if($module->name === 'permission') {

                Permission::insert([
                    ['name'=>'Create Permission','slug'=>'201', 'module_id'=> $module->id],
                    ['name'=>'Store Permission','slug'=>'202', 'module_id'=> $module->id],
                    ['name'=>'List Permission','slug'=>'203', 'module_id'=> $module->id],
                ]);
            } else if($module->name === 'user') {
                
                Permission::insert([
                    ['name'=>'Create User','slug'=>'301', 'module_id'=> $module->id],
                    ['name'=>'Store User','slug'=>'302', 'module_id'=> $module->id],
                    ['name'=>'Get User','slug'=>'303', 'module_id'=> $module->id],
                    ['name'=>'Edit User','slug'=>'304', 'module_id'=> $module->id],
                    ['name'=>'Update User','slug'=>'305', 'module_id'=> $module->id],
                    ['name'=>'List User','slug'=>'306', 'module_id'=> $module->id],
                    ['name'=>'Delete User','slug'=>'307', 'module_id'=> $module->id],
                ]);
            }
        }
    }
}
