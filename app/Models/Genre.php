<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function shops()
    {
        return $this->hasOne('App\Models\Shop');
    }
}
