<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

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
    public function show(Shop $shopp)
    {
        //
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
