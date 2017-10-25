<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    use Authenticatable;
    public function findForPassport($username) {
        return self::where('name', $username)->first();
    }
}
