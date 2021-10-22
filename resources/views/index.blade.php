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
</style>

@section('title','Rese-HOME-')

@section('content')
<x-guest-layout>
  <div class="flex__item wrap">
    @foreach($items as $item)
    <div class="practice__card">
      <div class="card__img">
        <img src="{{ asset('storage/'.$item->file_path) }}" alt="">
      </div>
      <div class="card__content">
        <h2 class="card__ttl">{{$item->shop_name}}</h2>
        <div class="tag">
          <p class="card__area">#{{$item->area->area_name}}</p>
          <p class="card__genre">#{{$item->genre->genre_name}}</p>
        </div>
        <div class="card__flex">
          <a href="{{ url('/detail') }}"><button class="card__cat">詳しく見る</button></a>
          <button id="like" class="like"><i class="fas fa-heart"></i></button>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <script>
    var like = document.querySelectorAll(".like");
    like.forEach(function(target) {
      target.addEventListener('click', function() {
        target.classList.toggle("change")
      });
    });
  </script>
</x-guest-layout>
@endsection('content')