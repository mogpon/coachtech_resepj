@extends('layouts.default')
<style>
    .r-title {
        background: #006699;
        border: 1px solid #e9eaea;
        border-radius: 5px 5px 0 0;
        height: 60px;
        line-height: 60px;
    }

    .r-title h1 {
        color: white;
        padding: 0 15px;
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px #000;
        font-family: 'IM Fell DW Pica SC', serif;
    }

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
        padding: 20px;
        border: 1px solid #e9eaea;
        border-radius: 0 0 5px 5px;
        background: #EEEEEE;
    }

    .size {
        font-size: 2em;
        vertical-align: middle;
        padding: 7px 0 0 0;
        margin-right: 10px;
    }

    .size2 {
        font-size: 1.78em;
        vertical-align: middle;
        padding: 10px 0 0 0;
        margin-right: 10px;
    }

    form {
        margin: 0;
    }

    .search {
        display: none;
    }
</style>
@section('title','Rese-Login-')

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
        <div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="content">
                <div class="r-title">
                    <h1>Login</h1>
                </div>
                <div class="card">
                    <div class="flex">
                        <i class="fas fa-envelope size2"></i>
                        <x-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="flex">
                        <i class="fas fa-unlock-alt size"></i>
                        <x-input id="password" placeholder="Password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                            {{ __('ログイン') }}
                        </x-button>
                    </div>
        </form>
</div>
</div>
</x-guest-layout>
@endsection('content')