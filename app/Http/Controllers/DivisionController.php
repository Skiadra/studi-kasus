<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    public function createDivision()
    {

        $validator = Validator::make(request()->all(), [
            'nama_divisi' => 'required|unique:divisions'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->message()]);
        }

        //Create Division
        $division = Division::create([
            'nama_divisi' => request('nama_divisi')
        ]);

        if ($division) {
            return response()->json(['message' => "Division Created"]);
        } else {
            return response()->json(['message' => "Division Failed to Create"]);
        }
    }

    public function getAllDivisions()
    {

        $divisions = Division::all();

        return response()->json([
            'message' => $divisions
        ]);
    }

    public function updateDivision()
    {

        $validator = Validator::make(request()->all(), [
            'nama_divisi' => 'required|unique:divisions',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->message()]);
        }

        $division = Division::where('id', request()->route('id'))->update([
            'nama_divisi' => request('nama_divisi')
        ]);

        if ($division) {
            return response()->json(['message' => "Division Updated"]);
        } else {
            return response()->json(['message' => "Division Failed to Update"]);
        }
    }

    public function deleteDivision()
    {
        $req = Division::find(request()->route('id'))->delete();

        if ($req) {
            return response()->json(['message' => "Division Deleted"]);
        } else {
            return response()->json(['message' => "Division Failed to Delete"]);
        }
    }
}
