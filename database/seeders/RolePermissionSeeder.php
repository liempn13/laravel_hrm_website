<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo các quyền
        $permissions = ['Create & Delete Project', 'Assign Project', 'Manage Staffs info', 'Manage BoD & HR accounts', 'Manage your department members'];
        foreach ($permissions as $permission) {
            Permissions::firstOrCreate(['permission_name' => $permission]);
        }

        // Tạo các vai trò
        $staff = Role::firstOrCreate(['role_name' => 'STAFF']);
        $projectManager = Role::firstOrCreate(['role_name' => 'Project Manager']);
        $departmentHead = Role::firstOrCreate(['role_name' => 'Department Head']);
        $HR = Role::firstOrCreate(['role_name' => 'HR']);
        $BoD = Role::firstOrCreate(['role_name' => 'BoD']);

        // Gán quyền cho từng vai trò
        $BoD->permissions()->sync(Permissions::all()); //Ban giám đốc có thể truy cập toàn bộ
        $HR->permissions()->sync(Permissions::where('permission_name', '=', 'Manage Staffs info')->get());
        $HR->permissions()->sync(Permissions::where('permission_name', '=', 'Manage your department members')->get());
        $departmentHead->permissions()->sync(Permissions::where('permission_name', '=', 'Manage your department members')->get());
        $departmentHead->permissions()->sync(Permissions::where('permission_name', '=', 'Create & Delete Project')->get());
        $departmentHead->permissions()->sync(Permissions::where('permission_name', '=', 'Assign Project')->get());
        $projectManager->permissions()->sync(Permissions::where('permission_name', '=', 'Assign Project')->get());
        // $staff->permissions()->sync(Permissions::where('permission_name', '=', '')->get());
    }
}