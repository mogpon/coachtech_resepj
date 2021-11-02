<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //areasテーブルから::pluckでarea_nameとidを抽出し、$areasに返す関数
    public function getLists()
    {
        $areas = Area::pluck('area_name', 'id');

        return $areas;
    }
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
