<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatives;
use Illuminate\Routing\Controller;

class RelativesController extends Controller
{
    public function show(string $id)
    {
        return (
            Relatives::findOrFail($id)
        );
    }
    public function showRelativesOf(string $profile_id)
    {
        return Relatives::where('profile_id', $profile_id)->get();
    }
    public function addNewRelatives(Request $request)
    {
        $fields = $request->validate([
            "relative_name" => "required|string",
            "relative_phone" => "required|string",
            "relative_birthday" => "required|date",
            "relationship" => "required|string",
            "relative_job" => "required|string",
            "relative_nation" => "required|string",
            "relative_temp_address" => "required|string",
            "relative_current_address" => "required|string",
            "profile_id" => 'required|string',
        ]);
        $newRelative = Relatives::create(attributes: [
            'profile_id' => $fields['profile_id'],
            'relative_name' => $fields['relative_name'],
            'relative_phone' => $fields['relative_phone'],
            'relative_birthday' => $fields['relative_birthday'],
            'relative_nation' => $fields['relative_nation'],
            'relative_job' => $fields['relative_job'],
            "relative_current_address" => $fields["relative_current_address"],
            "relative_temp_address" => $fields["relative_temp_address"],
            "relationship" => $fields["relationship"],
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $relatives = Relatives::find($request->relative_id);
        // Kiểm tra xem relative có tồn tại không
        if (!$relatives) {
            return response()->json([
                'message' => 'Relative not found'
            ], 404);  // Trả về lỗi 404 nếu không tìm thấy relative
        }
        $input = $request->validate([
            "relative_id" => 'required|integer',
            "relative_name" => "required|string",
            "relative_phone" => "required|string",
            "relative_birthday" => "required|date",
            "relationship" => "required|string",
            "relative_job" => "required|string",
            "relative_nation" => "required|string",
            "relative_temp_address" => "required|string",
            "relative_current_address" => "required|string",
            "profile_id" => 'required|string',
        ]);

        $relatives->relative_name = $input['relative_name'];
        $relatives->relative_phone = $input["relative_phone"];
        $relatives->relative_birthday = $input["relative_birthday"];
        $relatives->relative_job = $input["relative_job"];
        $relatives->relationship = $input["relationship"];
        $relatives->relative_nation = $input["relative_nation"];
        $relatives->relative_temp_address = $input["relative_temp_address"];
        $relatives->relative_current_address = $input["relative_current_address"];
        $relatives->profile_id = $input["profile_id"];
        $relatives->save();

        return response()->json([], 200);
    }

    public function delete(Relatives $relatives)
    {
        $relatives->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
    // public function delete($profile_id)
    // {
    //     // Tìm tất cả relatives có profile_id tương ứng
    //     $relatives = Relatives::where('profile_id', $profile_id)->get();
    
    //     // Nếu không tìm thấy relatives
    //     if ($relatives->isEmpty()) {
    //         return response()->json([
    //             "status" => false,
    //             "message" => "No relatives found for this profile",
    //             "data" => []
    //         ], 404); // Trả về lỗi 404 nếu không tìm thấy
    //     }
    
    //     // Xóa tất cả relatives liên kết với profile_id
    //     foreach ($relatives as $relative) {
    //         $relative->delete();
    //     }
    
    //     return response()->json([
    //         "status" => true,
    //         "message" => "Relatives deleted successfully",
    //         "data" => []
    //     ], 200); // Trả về mã 200 nếu xóa thành công
    // }
    
}
