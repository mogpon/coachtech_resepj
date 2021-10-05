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
    padding: 20px;
    border: 1px solid #e9eaea;
    border-radius: 0 0 5px 5px;
    background: #EEEEEE;
    font-size: 24px;
    color: black;
  }

  form {
    margin: 0;
  }

  .card h1 {
    color: black;
  }
</style>
@section('title','登録完了')

@section('content')
<x-guest-layout>
  <x-auth-validation-errors class="mb-4" :errors="$errors" />
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="content">
      <div class="card">
          <h1>会員登録ありがとうございます</h1>
          <div class="flex items-center justify-center mt-4">
            <x-button class="ml-4">
              {{ __('ログインへ') }}
            </x-button>
          </div>
      </div>
    </div>
  </form>
</x-guest-layout>
@endsection('content')