<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property User user
 * @property string order_no
 * @property integer id
 */
class Order extends Model
{
    //
    public function user() {
        return $this->belongsTo(User::class);
    }
}
