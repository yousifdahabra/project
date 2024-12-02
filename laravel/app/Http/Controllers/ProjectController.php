<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function add_project(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'project add successfully',
            'project' => $project
        ],201);
    }


    public function update_project(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails() && $id != '') {
            return response()->json($validator->errors(), 400);
        }
        $description = Project::findOrFail($id);

        $description::update([
            'name' => $request->name,
            'description' => $request->email,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Project Update successfully'
        ],201);
    }

    public function delete_project(Request $request,$id){

        if(empty($id)){
            return response()->json([
                'status' => 'error',
                'message' => 'ID not found'
            ],401);
        }

        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Project deleted successfully'
        ],201);

    }

}
