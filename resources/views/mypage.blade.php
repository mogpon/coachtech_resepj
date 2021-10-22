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
    width: 85%;
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

  .heart {
    color: gainsboro;
    font-size: 1.5em;
  }
</style>
@section('title','Rese-Mypage-')

@section('content')
<x-guest-layout>
  <div class="name">
    <h1>testさん</h1>
  </div>
  <div class="my-page_flex">
    <div class="mypage_left">
      <h2>予約状況</h2>
      <div class="my-reserve">
        <div class="my-reserve_title">
          <div class="my-reserve_number">
            <i class="far fa-clock clock"></i>
            <h3>予約1</h3>
          </div>
          <div class="cancel">
            <i class="far fa-times-circle cancel-btn"></i>
          </div>
        </div>
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
    <div class="mypage_right">
      <h2>お気に入り店舗</h2>
      <div class="flex__item wrap">
        <div class="practice__card">
          <div class="card__img">
            <img src="/img/sushi.jpg" alt="">
          </div>
          <div class="card__content">
            <h2 class="card__ttl">仙人</h2>
            <div class="tag">
              <p class="card__area">#東京都</p>
              <p class="card__genre">#寿司</p>
            </div>
            <div class="card__flex">
              <a href="http://127.0.0.1:8000/detail"><button class="card__cat">詳しく見る</button></a>
              <button><i class="fas fa-heart heart"></i></button>
            </div>
          </div>
        </div>
        <div class="practice__card">
          <div class="card__img">
            <img src="/img/yakiniku.jpg" alt="">
          </div>
          <div class="card__content">
            <h2 class="card__ttl">牛助</h2>
            <div class="tag">
              <p class="card__area">#大阪府</p>
              <p class="card__genre">#焼肉</p>
              </p>
            </div>
            <div class="card__flex">
              <a href="http://127.0.0.1:8000/detail"><button class="card__cat">詳しく見る</button></a>
              <button><i class="fas fa-heart heart"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
@endsection('content')