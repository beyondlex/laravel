<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int company_id
 * @property Company company
 */
class Admin extends Model
{
    //
    use Authenticatable;
    public function findForPassport($username) {
        return self::where('name', $username)->first();
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
