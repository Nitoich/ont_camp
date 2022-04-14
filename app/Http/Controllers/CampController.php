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
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/admin#camps')->withErrors([
                'NameError' => 'Поле не должно быть пустым!'
            ]);
        }

        $camp = Camp::create([
            'name' => $request->name
        ]);

        if($camp) {
            return redirect('/admin#camps');
        }
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/admin#camps')->withErrors([
                'NameError' => 'Поле не должно быть пустым!'
            ]);
        }

        $camp = Camp::where('id', $request->id)->first();

        if($camp) {
            $camp->delete();
            return redirect('/admin#camps');
        }
    }
}
