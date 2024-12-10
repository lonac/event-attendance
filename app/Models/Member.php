<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class,'marital_status');
    }
}
