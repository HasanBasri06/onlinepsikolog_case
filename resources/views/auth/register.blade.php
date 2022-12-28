@extends('layouts.layout')


@section('content')
    @error('message')
        <div class="my-5 w-full bg-green-300 text-green-900 px-5 py-3"
            x-data="{show:true}"
            x-init="setInterval(() => show = false, 5000)"
            x-show="show"
        >
            {{ $message }}
        </div>
    @enderror

    <form action="/register" method="post">
        @csrf
        <h1 class="text-center text-xl">Kayıt Ol</h1>
        <div class="flex flex-col mt-3">
            <label class="my-2 mt-3">İsim</label>
            <input type="text" name="name" class="border border-gray-600 py-2 px-4">
            @error('name')
                <div class="my-2 text-sm text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label class="my-2 mt-3">E-Posta</label>
            <input type="email" name="email" class="border border-gray-600 py-2 px-4">
            @error('email')
                <div class="my-2 text-sm text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label class="my-2 mt-3">Telefon</label>
            <input type="text" name="phone" class="border border-gray-600 py-2 px-4">
            @error('phone')
                <div class="my-2 text-sm text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label class="my-2 mt-3">Şifre</label>
            <input type="password" name="password" class="border border-gray-600 py-2 px-4">
            @error('password')
                <div class="my-2 text-sm text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex flex-col">
            <label class="my-2 mt-3">Şifre Onay</label>
            <input type="password" name="confirmPassword" class="border border-gray-600 py-2 px-4">
            @error('confirmPassword')
                <div class="my-2 text-sm text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="flex gap-4 items-center">
            <button class="mt-3 bg-sky-700 text-white py-2 px-4">Kayıt Ol</button>
            <a href="/login" class="mt-3 text-red-500">Giriş Yap</a>
        </div>
    </form>
@endsection
