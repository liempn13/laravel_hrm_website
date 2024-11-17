<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentsResource;
use App\Models\Assignments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AssignmentsController extends Controller
{
    public function index()
    {
        $assignments = Assignments::all();
        return response()->json($assignments);
    }

    public function show(string $id)
    {
        return Assignments::findOrFail($id);
    }
    public function getAssigmentDetails(string $projectId)
    {
        return
            DB::table('assignments')
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
            ->where([['assignments.project_id', '=', $projectId]],)
            ->get()
        ;
    }
    public function create(Request $request)
    {
        $fields = $request->validate([
            "profile_id" => "required|string",
            "task_id" => 'nullable|integer',
            "project_id" => "required|string",
        ]);
        $newDecision = Assignments::create([
            'profile_id' => $fields['profile_id'],
            'task_id' => $fields['task_id'],
            'project_id' => $fields['project_id'],
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $assignments = Assignments::find($request->assignment_id);
        $input = $request->validate([
            "assignment_id" => "required|integer",
            "profile_id" => "required|string",
            "task_id" => 'nullable|integer',
            "project_id" => "required|string",
        ]);

        $assignments->assignment_id = $input['assignment_id'];
        $assignments->profile_id = $input['profile_id'];
        $assignments->task_id = $input['task_id'];
        $assignments->project_id = $input['project_id'];
        $assignments->save();
        return response()->json([], 200);
    }

    public function delete(int $assignments_id)
    {
        $assignments = Assignments::find($assignments_id);
        $assignments->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
