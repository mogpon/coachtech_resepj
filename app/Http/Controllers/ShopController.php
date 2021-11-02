<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Shop::all();
        return view('image.index', compact('images'));
    }
    public function index2()
    {
        $items = Shop::all();
        return view('index', ['items' => $items]);
    }
    public function index3()
    {
        return view('/detail');
    }
    public function index4(Request $request)
    {
        // $items = Shop::all();
        // return view('/detail',['items' => $items]);
        $area = new Area;
        $areas = $area->getLists();
        $areaId = $request->input('areaId');
        $genre = new Genre;
        $genres = $genre->getLists2();
        $genreId = $request->input('genreId');

        return view('/detail', [
            'areas' => $areas,
            'areaId' => $areaId,
            'genres' => $genres,
            'genreId' => $genreId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('file')) {
            $this->validate($request, [
                'file' => [
                    // 空でないこと
                    'required',
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,png',
                ]
            ]);

            if ($request->file('file')->isValid([])) {
                // ファイルそのものはWebサーバに保存
                $file_name = $request->file('file')->getClientOriginalName();
                //$file_path = Storage::putFile('/uploads', $request->file('file'), 'public');
                $upload_image = $request->file('file');
                $file_path = $upload_image->store('uploads', "public");

                // ファイル名とパスは、DBに保存する。
                $image_info = new Shop();
                $image_info->file_path = $file_path;
                $image_info->description = $request->input('description');
                $image_info->shop_name = $request->input('shop_name');
                $image_info->area_id = $request->input('area_id');
                $image_info->genre_id = $request->input('genre_id');

                $image_info->save();
            }
        }
        // 前の画面に戻る
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shopp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        $area = new Area;
        $areas = $area->getLists();
        $areaId = $request->input('genreId');
        $genre = new Genre;
        $genres = $genre->getLists2();
        $genreId = $request->input('genreId');
        $searchWord = $request->input('searchWord');

        return view('index', [
            'areas' => $areas,
            'areaId' => $areaId,
            'genres' => $genres,
            'genreId' => $genreId,
            'searchWord' => $searchWord,
        ]);
    }
    public function search(Request $request)
    {
        //入力される値nameの中身を定義する
        $areaId = $request->input('areaId'); //areaの値
        $genreId = $request->input('genreId'); //genreの値
        $searchWord = $request->input('searchWord'); //shop_nameの値

        $query = Shop::query();
        //エリアが選択された場合、areasテーブルからarea_idが一致する商品を$queryに代入
        if (isset($areaId)) {
            $query->where('area_id', $areaId);
        }
        if (isset($genreId)) {
            $query->where('genre_id', $genreId);
        }
        if (isset($searchWord)) {
            $query->where('shop_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        $items = $query->get();
        $area = new Area;
        $areas = $area->getLists();
        $genre = new Genre;
        $genres = $genre->getLists2();

        return view('index')->with( [
            'items' => $items,
            'areas' => $areas,
            'areaId' => $areaId,
            'genres' => $genres,
            'genreId' => $genreId,
            'searchWord' => $searchWord,
        ]);
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shopp
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shopp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shopp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shopp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shopp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shopp)
    {
        //
    }
}
