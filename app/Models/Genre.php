<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function getLists2()
    {
        $genres = Genre::pluck('genre_name', 'id');

        return $genres;
    }
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
