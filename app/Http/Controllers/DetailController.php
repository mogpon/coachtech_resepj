<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $items = Shop::all();
        return view('/detail', ['items' => $items]);
    }
}
