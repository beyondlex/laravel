<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Company;
use App\Mail\AdminCreated;
use App\Mail\CompanyCreated;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function create() {
        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();
//        $company = Company::find($admin->company_id);
//        \Mail::to('649981596@qq.com')->queue(new CompanyCreated($company));
        \Mail::to('649981596@qq.com')->queue(new AdminCreated($admin));
    }
}
