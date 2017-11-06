<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{

    //
    function index() {
        return Carbon::now()->toDateTimeString();
    }

    function companies() {
        return Company::all();
    }
}
