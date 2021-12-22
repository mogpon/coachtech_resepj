<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Shop extends Model
{
    protected $fillable = [
        'shop_name', 'area_id', 'genre_id', 'description', 'file_path',
    ];
       public function area()
    {
        return $this->belongsTo(Area::class);
    }
       public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function isFavorite()
    {
        return $this->hasMany(Favorite::class)->where('user_id', Auth::id())->exists();
    }
    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }
}