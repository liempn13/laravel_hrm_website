<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function show()
    {
        return Projects::where('');
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

    public function update(Request $request, Projects $projects)
    {

        $input = $request->validate([
            "project_id" => "required|string",
            "project_name" => "required|string",
            "project_status" => "required|integer",
        ]);
        $projects->project_id = $input['project_id'];
        $projects->project_name = $input['project_name'];
        $projects->project_status = $input['project_status'];
        $projects->save();
        return response()->json([], 200);
    }
    public function delete(Projects $projects)
    {
        $projects->delete();
        return response()->json(["message" => "Delete success"], 200);
    }
}
