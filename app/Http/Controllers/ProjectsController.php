<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function index()//Lấy tất cả dự án của cty
    {
        $projects = Projects::all();
        return response()->json($projects);
    }

    public function getAssigmentOfDepartments(string $department_id)//Lấy dsach dự án của phòng ban
    {
        return DB::table('assignments')
            ->join('profiles', 'assignments.profile_id', '=', 'profiles.profile_id')
            ->join('projects', 'assignments.project_id', '=', 'projects.project_id')
            ->join('tasks', 'assignments.task_id', '=', 'tasks.task_id')
            ->select(
                'projects.project_id',
                'projects.project_name',
                'profiles.profile_id',
                'profiles.profile_name',
                'tasks.*'
            )
            ->where(['profiles.department_id', '=', $department_id],)
            ->get()
        ;
    }

    public function createNewProject(Request $request)
    {
        $fields = $request->validate([
            "project_id" => "required|string",
            "project_name" => "required|string",
            "project_status" => "required|integer",
        ]);
        $newAccount = Projects::create([
            'project_id' => $fields['project_id'],
            'project_name' => $fields['project_name'],
            "project_status" => $fields['project_status'],
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {

        $projects = Projects::find($request->project_id);
        $input = $request->validate([
            "project_id" => "required|string",
            "project_name" => "required|string",
            "project_status" => "required|integer",
        ]);
        $projects->project_id = $input['project_id'];
        $projects->project_name = $input['project_name'];
        $projects->project_status = $input['project_status'];
        $projects->update();
        return response()->json([], 200);
    }
    public function delete($id)
    {
        $projects = Projects::find($id);

        if (!$projects) {
            return response()->json([
                "status" => false,
                "message" => "Department not found",
                "data" => []
            ], 404);
        }

        $projects->delete();
        return response()->json([
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ], 200);
    }
}
