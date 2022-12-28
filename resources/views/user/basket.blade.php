@extends('layouts.layout')

@section('content')
    @error('message')
        <div class="my-5 w-full bg-green-300 text-green-900 px-5 py-3" x-data="{ show: true }" x-init="setInterval(() => show = false, 5000)" x-show="show">
            {{ $message }}
        </div>
    @enderror

    <div class="w-full flex gap-1">
        <div class="w-3/4 flex flex-col gap-4">

            @foreach ($baskets as $basket)
                <div class="w-full h-28 gap-2 flex p-2 bg-white border">
                    <img src="{{ asset('images/' . $basket->image) }}" class="w-24 h-24" alt="">
                    <div class="w-60 flex items-center justify-center">
                        {{ $basket->image }}
                    </div>
                    <div class="w-60 flex items-center justify-center">
                        {{ $basket->price }} ₺
                    </div>
                </div>
            @endforeach

            @if ($baskets->count() < 1)
                <div>Sepetiniz boş</div>
            @endif


        </div>
        <div class="w-1/4">
            @if ($baskets->count() > 0)
                <div class="border p-2">
                    <h3 class="text-lg font-medium">Toplam Fiyat</h3>
                    <h3 class="mt-3">{{ $totalPrice }} ₺</h3>
                    <br>
                    <a class="mt-3 bg-sky-700 text-white py-2 px-4" href="/buyProducts">
                        Satın Al
                    </a>


                </div>
        </div>
        @endif
    </div>
@endsection
