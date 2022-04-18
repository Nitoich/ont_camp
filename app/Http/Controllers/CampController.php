<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Region;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CampController extends Controller
{
    public function getByIdRegions(Request $request) {
        $region = Region::where('id', $_REQUEST['id'])->first();
        return response()->json($region->camps);
    }


    public function add(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'region_id' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json()->setStatusCode(400);
        }

        $camp = Camp::create([
            'name' => $request->name,
            'region_id' => $request->region_id
        ]);

        if($camp) {
            return response()->json()->setStatusCode(201);
        }
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json()->setStatusCode(400);
        }

        $camp = Camp::where('id', $request->id)->first();

        if($camp) {
            $camp->delete();
            return response()->json()->setStatusCode(200);
        }
    }
}
