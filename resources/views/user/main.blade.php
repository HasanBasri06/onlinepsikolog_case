@extends('layouts.layout')

@section('content')
    @error('message')
        <div class="my-5 w-full bg-green-300 text-green-900 px-5 py-3" x-data="{ show: true }" x-init="setInterval(() => show = false, 5000)" x-show="show">
            {{ $message }}
        </div>
    @enderror
    <form action="/changeUserInfo" method="post">
        @csrf
        <h1 class="text-lg font-medium text-center">Bilgileri Değiştir</h1>

        <div class="flex flex-col">
            <label class="my-3">İsim</label>
            <input type="name" name="name" class="border border-gray-600 py-2 px-4" value="{{ $user->name }}">
        </div>

        <div class="flex flex-col">
            <label class="my-3">E-posta</label>
            <input type="email" name="email" class="border border-gray-600 py-2 px-4" value="{{ $user->email }}">
        </div>

        <div class="flex flex-col">
            <label class="my-3">Telefon</label>
            <input type="tel" name="phone" class="border border-gray-600 py-2 px-4" value="{{ $user->phone }}">
        </div>

        <button class="mt-3 bg-sky-700 text-white py-2 px-4">Değiştir</button>

    </form>
@endsection
