<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Company;
use App\Mail\AdminCreated;
use App\Mail\CompanyCreated;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function create() {
        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();
        $user = User::find(1);
//        $company = Company::find($admin->company_id);

        $when = Carbon::now()->addMinute(1);

        \Mail::to($user)->later($when, new AdminCreated($admin));
    }
}
