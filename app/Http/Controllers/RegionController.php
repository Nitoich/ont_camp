<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Region;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class RegionController extends Controller
{
    public function get(){
        $query = $_REQUEST['query'] ?? '';
        return response()->json(Region::where('name', 'like', '%' . $query . '%')->get());
    }

    public function add(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $region = Region::create([
            'name' => $request->name
        ]);

        if ($region) {
            return response()->json()->setStatusCode(201);
        } else {
            return response()->json()->setStatusCode(400);
        }
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $region = Region::where('id', $request->id)->first();
        if ($region) {
            $camps = Camp::where('region_id', $request->id)->get();
            $camps->each(function($camp) {
                $camp->delete();
            });

            $region->delete();
            return response()->json()->setStatusCode(200);
        } else {
            return response()->json()->setStatusCode(404);
        }
    }
}
