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
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <div class="content">
        <div class="card">
          <h1>ご予約ありがとうございます</h1>
          <div class="flex items-center justify-center mt-4">
            <a href="http://127.0.0.1:8000">
              <x-button class="ml-4">
                戻る
              </x-button>
          </a>
          </div>
        </div>
      </div>
    </form>
  </x-guest-layout>
  @endsection('content')