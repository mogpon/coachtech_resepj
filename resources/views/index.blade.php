@extends('layouts.default')
<style>
  .flex__item {
    width: 85%;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
  }

  .wrap {
    margin: 0 auto;
  }

  .practice__card {
    width: 100%;
    box-shadow: 0px 3px 10px rgb(0, 0, 0, 0.2);
    border-radius: 0 0 5px 5px;
    margin: 8px 0;
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
    margin-top: 20px;
    cursor: pointer;
  }

  .card__ttl {
    font-size: 18px;
    text-align: justify;
    font-weight: bold;
  }

  .tag {
    display: flex;
    justify-content: flex-start;
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

  .like {
    color: gainsboro;
    font-size: 1.5em;
  }

  .change {
    color: red;
  }


  @media screen and (min-width:768px) {
    .practice__card {
      width: 33%;
    }
  }

  @media screen and (min-width:1000px) {
    .practice__card {
      width: 24%;
    }
  }

  .search_box {
    display: inline-block;
    position: relative;
  }

  .search_box::before {
    content: "";
    width: 16px;
    height: 16px;
    background: url(/img/icon.png) no-repeat center center / auto 100%;
    display: inline-block;
    position: absolute;
    top: 13px;
    left: 8px;
  }

  .search_box input {
    padding-left: 27px;
  }
  .favorite{
    padding-top:22px;
    margin:0;
    vertical-align: middle;
  }
</style>

@section('title','Rese-HOME-')

@section('content')
@auth
  <nav class="menu-one" id="menu-one">
    <ul class="menu_list">
      <li><a href="http://127.0.0.1:8000/">Home</a></li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
          {{ __('Logout') }}
        </a>
      </form>
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
<form class="serch" method="GET" action="/">
  <div class="search">
    <select id="area" name="areaId" value="{{ $areaId }}">
      <option value="">All area</option>
      @foreach($areas as $id => $area_name)
        @if ($id == $areaId)
          <option value="{{ $id }}" selected>{{ $area_name }}</option>
        @else
          <option value="{{ $id }}">{{ $area_name }}</option>
        @endif
      @endforeach
    </select>
    <select id="genre" name="genreId" value="{{ $genreId }}">
      <option value="">All genre</option>
      @foreach($genres as $id => $genre_name)
      @if ($id == $genreId)
        <option value="{{ $id }}" selected>{{ $genre_name }}</option>
      @else
        <option value="{{ $id }}">{{ $genre_name }}</option>
      @endif
      @endforeach
    </select>
    <div class="search_box">
      <input type="text" placeholder="Search..." name="searchWord" value="{{ $searchWord }}">
    </div>
    <button type="submit" id="submit" style="display:none;">検索</button>
  </div>
</form>
</div>
</header>
<div class=" content" id="content">
      <x-guest-layout>
        @if (!empty($shops))
        <div class="flex__item wrap">
          @foreach($shops as $shop)
          <div class="practice__card">
            <div class="card__img">
              <img src="{{ asset('storage/'.$shop->file_path) }}" alt="">
            </div>
            <div class="card__content">
              <h2 class="card__ttl">{{\Illuminate\Support\Str::limit($shop->shop_name,20,'...')}}</h2>
              <div class="tag">
                <p class="card__area">#{{$shop->area->area_name}}</p>
                <p class="card__genre">#{{$shop->genre->genre_name}}</p>
              </div>
              <div class="card__flex">
                <a href="{{ route('detail',['shopId'=>$shop->id])}}" >
                  <button class="card__cat">
                  詳しく見る
                  </button>
                </a>
                @guest
                <button id="like" class="like"><i class="fas fa-heart"></i></button>
                @endguest
                @auth
                  @if($shop->isFavorite() == true)
                          <form action="{{ route('unfavorites', $shop->id) }}" method="POST" class="favorite">
                            @csrf
                                <button id="like" class="like"><i class="fas fa-heart"  style="color: red;"></i></button>
                          </form>
                      @else
                          <form action="{{ route('favorites', $shop->id) }}" method="POST" class="favorite">
                          @csrf
                              <button id="like" class="like"><i class="fas fa-heart"></i></button>
                          </form>
                  @endif
                @endauth
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </x-guest-layout>
      @endsection('content')