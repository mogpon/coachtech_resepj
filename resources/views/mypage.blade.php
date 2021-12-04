@extends('layouts.default')
<style>
  .search {
    display: none;
  }

  .name {
    width: 85%;
    text-align: center;
    margin: 0 auto 20px;
    font-family: 'IM Fell DW Pica SC', serif;
  }

  .name h1 {
    font-size: 30px;
    font-weight: bold;
  }

  .my-page_flex {
    width: 85%;
    display: flex;
    justify-content: space-between;
    margin: 0 auto;
    font-family: 'IM Fell DW Pica SC', serif;
  }

  .mypage_left h2,
  .mypage_right h2 {
    font-weight: bold;
    font-size: 18px;
    margin-top: 10px;
  }

  .mypage_left {
    width: 40%;
  }

  .my-reserve {
    background: #006699;
    padding: 30px;
    border-radius: 5px;
    color: white;
    margin: 8px 0;
    box-shadow: 0px 3px 10px rgb(0, 0, 0, 0.2);
  }

  .my-reserve_title {
    display: flex;
    justify-content: space-between;
  }

  .my-reserve_number {
    display: flex;
  }

  .my-reserve_number h3 {
    font-weight: bold;
    font-size: 18px;
  }

  .my-reserve_number .clock {
    font-size: 1.5em;
    margin-right: 5px;
  }

  .cancel-btn {
    font-size: 1.5em;
  }

  table {
    color: white;
    margin-top: 20px;
  }

  th {
    text-align: left;
  }

  td {
    padding-left: 20px;
  }


  .mypage_right {
    width: 55%;
  }

  .flex__item {
    width: 100%;
    display: flex;
  }

  .practice__card {
    width: 100%;
    box-shadow: 0px 3px 10px rgb(0, 0, 0, 0.2);
    border-radius: 0 0 5px 5px;
    margin: 8px 0;
    margin-right: 15px;
    font-family: 'IM Fell DW Pica SC', serif;
  }

  img {
    width: 100%;
    border-radius: 5px 5px 0 0;
  }

  .card__content {
    margin: 20px;
  }

  .card__cat {
    color: white;
    display: inline-block;
    padding: 5px 15px;
    background: #006699;
    font-size: 12px;
    border-radius: 5px;
    font-weight: bold;
  }

  .card__ttl {
    font-size: 18px;
    text-align: justify;
    font-weight: bold;
  }

  .tag {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 10px;
    font-size: 14px;
  }

  .card__area {
    color: gray;
    margin-right: 10px;
  }

  .card__genre {
    color: gray;
  }

  .card__flex {
    display: flex;
    justify-content: space-between;
  }
  .favorite{
    margin:0;
    vertical-align: middle;
    font-size: 1.5em;
  }
  .wrap {
    margin: 0 auto;
  }
  @media screen and (min-width:768px) {
    .practice__card {
      width: 25%;
    }
  }

  @media screen and (min-width:1000px) {
    .practice__card {
      width: 50%;
    }
  }
</style>
@section('title','Rese-Mypage-')

@section('content')
@auth
  <nav class="menu-one" id="menu-one">
    <ul class="menu_list">
      <li><a href="http://127.0.0.1:8000/">Home</a></li>
      <li><a href="http://127.0.0.1:8000/dashboard">Logout</a></li>
      <li><a href="http://127.0.0.1:8000/mypage">Mypage</a></li>
    </ul>
  </nav>
@endauth
@guest
  <nav class="menu-two" id="menu-two">
    <ul class="menu_list2">
      <li><a href="http://127.0.0.1:8000/">Home</a></li>
      <li><a href="http://127.0.0.1:8000/register">Registration</a></li>
      <li><a href="http://127.0.0.1:8000/login">Login</a></li>
    </ul>
  </nav>
@endguest
</div>
</header>
<div class="content" id="content">
  <x-guest-layout>
    <div class="name">
      <h1>{{$user->user_name}}さん</h1>
    </div>
    <div class="my-page_flex">
      <div class="mypage_left">
        <h2>予約状況</h2>
        @foreach($reserves as $reserve)
        <div class="my-reserve">
          <div class="my-reserve_title">
            <div class="my-reserve_number">
              <i class="far fa-clock clock"></i>
              <h3>予約{{$reserve->id}}</h3>
            </div>
            <form action="{{ route('reserve_del')}}" method="post">
            @csrf
              <div class="cancel">
                <button>
                  <i class="far fa-times-circle cancel-btn"></i>
                </button>
                <input type="hidden" value="{{$reserve->id}}" name="id">
              </div>
            </form>
          </div>
          <table>
            <tr>
              <th>Shop</th>
              <td>{{$reserve->shop->shop_name}}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{$reserve->reserved_at->format('Y-m-d')}}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{$reserve->reserved_at->format('H:i')}}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{$reserve->guest_count}}</td>
            </tr>
          </table>
        </div>
        @endforeach
      </div>
      <div class="mypage_right">
        <h2>お気に入り店舗</h2>
        <div class="flex__item wrap">
          @foreach($favorites as $favorite)
          <div class="practice__card">
            <div class="card__img">
              <img src="{{ asset('storage/'.$favorite->shop->file_path) }}" alt="">
            </div>
            <div class="card__content">
              <h2 class="card__ttl">{{$favorite->shop->shop_name}}</h2>
              <div class="tag">
                <p class="card__area">#{{$favorite->shop->area->area_name}}</p>
                <p class="card__genre">#{{$favorite->shop->genre->genre_name}}</p>
              </div>
              <div class="card__flex">
                <a href="{{ route('detail',['shopId'=>$favorite->shop->id])}}" >
                  <button class="card__cat">
                  詳しく見る
                  </button>
                </a>
                @if($favorite->shop->isFavorite() == true)
                        <form action="{{ route('unfavorites', $favorite->shop->id) }}" method="POST" class="favorite">
                          @csrf
                              <button id="like" class="like"><i class="fas fa-heart"  style="color: red;"></i></button>
                        </form>
                    @else
                        <form action="{{ route('favorites', $favorite->shop->id) }}" method="POST" class="favorite">
                        @csrf
                            <button id="like" class="like"><i class="fas fa-heart"></i></button>
                        </form>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </x-guest-layout>
  @endsection('content')