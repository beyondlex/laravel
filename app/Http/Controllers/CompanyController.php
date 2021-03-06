<?php

namespace App\Http\Controllers;

use App\Mail\AdminCreated;
use App\Mail\CompanyCreated;
use App\Models\Admin;
use App\Models\User;
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
        \Mail::to($user)->queue(new AdminCreated($admin));
//
//        $when = Carbon::now()->addMinute(1);
//        \Mail::to($user)->later($when, new AdminCreated($admin));
    }
}
