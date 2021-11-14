<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'shop_id'
    ];

    protected $guarded = [
        'id'
    ];
    protected $table = 'favorite';

    public function user()
    {
        return $this->belongTo(User::class);
    }
    
    public function shop()
    {
        return $this->belongTo(Shop::class);
    }
    
}