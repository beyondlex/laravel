<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 */
class Company extends Model
{
    //
    public function admin() {
        return $this->hasOne(Admin::class);
    }
}
