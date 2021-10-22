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
  }

  img {
    width: 100%;
    margin: 15px 0;
  }

  .card__ttl {
    font-size: 18px;
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
<x-guest-layout>
  <div class="shop_detail">
    <div class="left">
      <div class="shop_name">
        <a href="http://127.0.0.1:8000/"><i class="far fa-arrow-alt-circle-left back"></i></a>
        <h1 class="card__ttl">仙人</h1>
      </div>
      <img src="/img/sushi.jpg" alt="">
      <div class="tag">
        <p class="card__area">#東京都</p>
        <p class="card__genre">#寿司</p>
      </div>
      <div class="description">
        <p>料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。</p>
      </div>
    </div>
    <div class="right">
      <div class="right2">
        <h1>予約</h1>
        <div class="insert">
          <input class="a" type="date">
          <select name="time">
            <option value="1">17:00</option>
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
          <select name="guest_count">
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
            <option value="5">5人</option>
          </select>
        </div>
        <div class="reserve">
          <table>
            <tr>
              <th>Shop</th>
              <td>仙人</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>2021-04-01</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>17:00</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>1人</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="reserve_end">
        <a href="">
          <h2>予約する</h2>
        </a>
      </div>
    </div>
  </div>
</x-guest-layout>
@endsection('content')