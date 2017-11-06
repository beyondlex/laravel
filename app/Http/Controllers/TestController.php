<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $company;

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    //
    function index() {
        return Carbon::now()->toDateTimeString();
    }

    function companies() {
        return $this->company->all();
    }
}
