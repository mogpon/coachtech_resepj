@extends('layouts.default')
<style>
  .search {
    display: none;
  }

  .shop_detail {
    width: 85%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
  }

  .left {
    width: 48%;
    font-family: 'IM Fell DW Pica SC', serif;
  }

  .back {
    font-size: 1.5em;
    margin-right: 7px;
    margin-top: 6px;
  }

  img {
    width: 100%;
    margin: 15px 0;
  }

  .card__ttl {
    font-size: 24px;
    text-align: justify;
    font-weight: bold;
  }

  .tag {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 15px;
    font-size: 14px;
  }

  .card__area {
    color: gray;
    margin-right: 10px;
  }

  .card__genre {
    color: gray;
  }

  .description {
    font-size: 14px;
  }

  .shop_name {
    display: flex;
  }

  .right {
    width: 48%;
    font-family: 'IM Fell DW Pica SC', serif;
    box-shadow: 0px 3px 10px rgb(0, 0, 0, 0.2);
  }

  .right2 {
    width: 100%;
    background: #006699;
    padding: 20px 15px 110px;
    margin: 0 auto;
    border-radius: 5px 5px 0 0;
  }

  .right h1 {
    font-weight: bold;
    font-size: 18px;
    color: white;
  }

  .insert {
    margin: 20px 0;
    border-radius: 5px;
  }

  input,
  select {
    width: 100%;
    font-size: small;
    display: block;
  }

  .reserve {
    width: 100%;
    background: #0099CC;
    margin: 30px auto;
    padding: 15px;
  }

  table {
    color: white;

  }

  th {
    text-align: left;
  }

  td {
    padding-left: 20px;
  }

  .reserve_end {
    width: 100%;
    height: 60px;
    line-height: 60px;
    text-align: center;
    color: white;
    font-weight: bold;
    background: #003366;
    border-radius: 0 0 5px 5px;
  }
</style>
@section('title','Rese-Detail-')

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
</div>
</header>
<div class="content" id="content">
  <x-guest-layout>
    <div class="shop_detail">
      <div class="left">
        <div class="shop_name">
          <a href="http://127.0.0.1:8000/"><i class="far fa-arrow-alt-circle-left back"></i></a>
          <h1 class="card__ttl">{{$_POST["shop_name"]}}</h1>
        </div>
        <img src="{{ asset('storage/'.$_POST['file_path']) }}" alt="">
        <div class="tag">
          <p class="card__area">#{{$_POST["area_name"]}}</p>
          <p class="card__genre">#{{$_POST["genre_name"]}}</p>
        </div>
        <div class="description">
          <p>{{$_POST["description"]}}</p>
        </div>
      </div>
      <div class="right">
        {{-- <form class="form" action="{{ route('reserve') }}" method="POST"> --}}
        @csrf
        <div class="right2">
          <h1>予約</h1>
          <div class="insert">
            <input type="date" id="inputDate" onchange="inputDate()">
            <select onchange="inputTime(this);">
              <option value="">選択してください</option>
              <option value=" 1">17:00</option>
              <option value="2">17:30</option>
              <option value="3">18:00</option>
              <option value="4">18:30</option>
              <option value="5">19:00</option>
              <option value="6">19:30</option>
              <option value="7">20:00</option>
              <option value="8">20:30</option>
              <option value="9">21:00</option>
              <option value="10">21:30</option>
            </select>
            <select onchange="inputNumber(this);">
              <option value="">選択してください</option>
              <option value="1">1人</option>
              <option value="2">2人</option>
              <option value="3">3人</option>
              <option value="4">4人</option>
              <option value="5">5人</option>
              <option value="1">6人</option>
              <option value="2">7人</option>
              <option value="3">8人</option>
              <option value="4">9人</option>
              <option value="5">10人</option>
            </select>
          </div>
          <div class="reserve">
            <table>
              <tr>
                <th>Shop</th>
                <td>{{$_POST["shop_name"]}}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>
                  <div id="date"></div>
                </td>
              </tr>
              <tr>
                <th>Time</th>
                <td>
                  <div id="time"></div>
                </td>
              </tr>
              <tr>
                <th>Number</th>
                <td>
                  <div id="number"></div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="reserve_end">
          @auth
          <a href=" http://127.0.0.1:8000/done">
          @endauth
            <h2>予約する</h2>
          </a>
        </div>
        {{-- </form> --}}
      </div>
    </div>
  </x-guest-layout>
  @endsection('content')