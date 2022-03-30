<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class RequestsController extends Controller
{
    public function addRequest(Request $request) {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'old' => 'required|numeric',
            'camp_id' => 'required|numeric',
            'phone' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return redirect('/')->withErrors([
                'validation' => var_dump($validator->errors())
            ]);
        }

        $req = Requests::create([
            'full_name' => $request->full_name,
            'old' => $request->old,
            'camp_id' => $request->camp_id,
            'phone' => $request->phone
        ]);

        if($req) {
            return redirect('/')->withErrors([
                'succes' => 'Успешно!'
            ]);
        }
    }
}
