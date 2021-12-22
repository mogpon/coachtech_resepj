<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 店舗情報追加画面
    public function index()
    {
        $images = Shop::all();
        return view('image.index', compact('images'));
    }
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
        return back();
    }

    // ホーム（店舗一覧）表示
    public function search(Request $request, Shop $shop)
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
        $shops = $query->get();
        $area = new Area;
        $areas = $area->getLists();
        $genre = new Genre;
        $genres = $genre->getLists2();
        // var_dump($items[0]->isFavorite());

        return view('index')->with([
            'shops' => $shops,
            'areas' => $areas,
            'areaId' => $areaId,
            'genres' => $genres,
            'genreId' => $genreId,
            'searchWord' => $searchWord,
        ]);
    }

    // 検索バー
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

    // 詳細画面へ（「詳しく見る」クリック時）
    public function detail($shopId)
    {
        $query = new Shop();
        $shop = $query->find((int)$shopId);
        $query2 = new Shop();
        $favorite = $query->find((int)$shopId);
        return view('/detail', [
            'shop' => $shop,
            'favorite' => $favorite,
        ]);
    }

    // 予約完了画面へ（「予約」クリック時）
    public function reserve(Shop $shop, Request $request)
    {
        $reserve = new Reserve();
        $reserve->reserved_at = $request->date .' '. $request->time;
        $reserve->guest_count = $request->guest_count;
        $reserve->shop_id = $request->shopId;
        $reserve->user_id = Auth::user()->id;
        $reserve->save();
        return view('/done');
    }

    // マイページ
    public function mypage()
    {
        $user = Auth::user();
        $query = Reserve::query();
        $query->where('user_id', Auth::id());
        $query2 = Favorite::query();
        $query2->where('user_id', Auth::id());
        $reserves = $query->get();
        $favorites = $query2->get();
        return view('/mypage', [
            'user' => $user,
            'reserves' => $reserves,
            'favorites' => $favorites,
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
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shopp
     * @return \Illuminate\Http\Response
     */
    

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
    public function reserve_del(Request $request)
    {
        Reserve::find($request->id)->delete();
        return redirect('/mypage');
    }
}
