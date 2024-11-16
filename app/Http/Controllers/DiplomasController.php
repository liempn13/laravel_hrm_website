<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diplomas;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\DiplomasResource as DiplomasResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class DiplomasController extends Controller
{
    public function index()
    {
        $diploma = Diplomas::all();
        return response()->json($diploma);
    }

    // public function getDiplomaOfProfile(string $profile_id)
    // {
    //     return
    //         DB::table('diplomas')
    //         ->join('profiles', 'diplomas.profile_id', '=', 'profiles.profile_id')
    //         ->select(
    //             'profiles.profile_name',
    //             'diplomas.*'
    //         )
    //         ->where([['profiles.profile_id', '=', $profile_id]],)
    //         ->get()
    //     ;
    // }
    public function getDiplomaOfProfile(string $profile_id)
    {
        return Diplomas::where('profile_id', $profile_id)->get();
    }
    public function createNewDiploma(Request $request)
    {
        $fields = $request->validate([
            "diploma_id" => "required|string",
            "diploma_degree_name" => "required|string",
            "diploma_image" => "required|string",
            "ranking" => "required|string",
            "license_date" => "required|date",
            "diploma_type" => "required|string",
            "granted_by" => "required|string",
            "major" => "required|string",
            "mode_of_study" => "required|string",
            'profile_id' => "required|string",
        ]);
        $newDiploma = Diplomas::create([
            'diploma_id' => ($fields['diploma_id']),
            'mode_of_study' => ($fields['mode_of_study']),
            'granted_by' => ($fields['granted_by']),
            'license_date' => ($fields['license_date']),
            'diploma_degree_name' => ($fields['diploma_degree_name']),
            'major' => ($fields['major']),
            'diploma_type' => ($fields['diploma_type']),
            'diploma_image' => ($fields['diploma_image']),
            'ranking' => ($fields['ranking']),
            'profile_id' => ($fields['profile_id']),
        ]);
        return response()->json([], 201);
    }


    public function update(Request $request, Diplomas $diplomas)
    {
        $input = $request->validate( [
            "diploma_id" => "required|string",
            "diploma_degree_name" => "required|string",
            "diploma_image" => "required|string",
            "ranking" => "required|string",
            "license_date" => "required|date",
            "diploma_name" => "required|string",
            "diploma_type" => "required|string",
            "granted_by" => "required|string",
            "major" => "required|string",
            "mode_of_study" => "required|string",
        ]);

        $diplomas->diploma_degree_name = $input['diploma_name'];
        $diplomas->diploma_type = $input['diploma_id'];
        $diplomas->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new DiplomasResource($diplomas)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Diplomas $diplomas)
    {
        $diplomas->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}