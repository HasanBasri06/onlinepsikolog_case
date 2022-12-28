@extends('layouts.layout')

@section('content')

    

    <h3 class="text-2xl">Ürünler Listesi</h3>
    <div class="grid grid-cols-4 grid-flow-row mt-3 gap-3">
        @foreach ($products as $product)
            <div class="h-card_postcard_post p-2 border">
                <img src="{{ asset('images/' . $product->image) }}" alt="">
                <h3 class="text-sm text-center mt-3">{{ $product->name }}</h3>
                <h3 class="text-lg text-center mt-2">{{ number_format($product->price, 2, ',', '.') }} ₺</h3>
                <a href="/product/{{ $product->slug }}">
                    <div class="w-24 py-1 text-center mt-3 bg-green-300 text-green-900 m-auto">
                        incele
                    </div>
                </a>
            </div>
        @endforeach


    </div>
    @if ($products->count() < 1)
        <h1 class="text-red-800">Şuan Sistem Üzerinde Ürün Bulunmamaktadır</h1>
    @endif
@endsection
