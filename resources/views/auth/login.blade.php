@extends('layouts.layout')


@section('content')


    @error('message')
        <div class="my-5 w-full bg-red-300 text-red-900 px-5 py-3" x-data="{ show: true }" x-init="setInterval(() => show = false, 5000)"
            x-show="show">
            {{ $message }}
        </div>
    @enderror

    <form action="/login" method="post">
        @csrf
        <h1 class="text-center text-lg">Giriş Yap</h1>
        <div class="flex flex-col mt-3">
            <label class="mt-2">E-Posta</label>
            <input type="email" name="email" class="border my-1 py-2 px-4 border-gray-500">
        </div>

        <div class="flex flex-col">
            <label class="mt-2">Şifre</label>
            <input type="password" name="password" class="border my-1 py-2 px-4 border-gray-500">
        </div>

        <div class="flex gap-4 items-center">
            <button class="mt-3 bg-sky-700 text-white py-2 px-4">Giriş Yap</button>
            <a href="/register" class="mt-3 text-red-500">Kayıt Ol</a>
        </div>

    </form>
@endsection
