<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class RegionController extends Controller
{
    public function get() {
        return response()->json(Region::all());
    }
}
