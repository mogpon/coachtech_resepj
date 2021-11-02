@extends('layouts.default')
<style>
  .content {
    width: 55%;
    margin: 0 auto;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .card {
    padding: 40px;
    border: 1px solid #e9eaea;
    border-radius: 0 0 5px 5px;
    background: #EEEEEE;
    font-size: 24px;
    color: black;
    box-shadow: 0px 3px 10px rgb(0, 0, 0, 0.2);
  }

  form {
    margin: 0;
  }

  .card h1 {
    color: black;
  }

  .search {
    display: none;
  }
</style>
@section('title','Rese-Done-')

@section('content')
<nav class="menu-one" id="menu-one">
  <ul class="menu_list">
    <li><a href="">Home</a></li>
    <li><a href="">Logout</a></li>
    <li><a href="">Mypage</a></li>
  </ul>
</nav>
<nav class="menu-two" id="menu-two">
  <ul class="menu_list2">
    <li><a href="">Home</a></li>
    <li><a href="">Registration</a></li>
    <li><a href="">Login</a></li>
  </ul>
</nav>
</div>
</header>
<div class="content" id="content">
  <x-guest-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="content">
        <div class="card">
          <h1>ご予約ありがとうございます</h1>
          <div class="flex items-center justify-center mt-4">
            <x-button class="ml-4">
              {{ __('戻る') }}
            </x-button>
          </div>
        </div>
      </div>
    </form>
  </x-guest-layout>
  @endsection('content')