<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Company;
use App\Mail\CompanyCreated;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function create() {
        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();
        $company = Company::find($admin->company_id);
//        \Mail::to('beyondsnk@163.com')->send(new CompanyCreated($company));
        \Mail::to('beyondsnk@163.com')->queue(new CompanyCreated($company));
    }
}
