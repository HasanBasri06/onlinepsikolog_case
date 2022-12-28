@extends('layouts.layout')

@section('content')
    <div class="flex">
        <div class="w-3/4 flex gap-1">
            <div class="w-7/12">
                <img src="{{ asset('images/'.$product[0]->image) }}"  alt="">
            </div>
            <div class="w-5/12">
                @error('message')
                    <div class="my-5 w-full bg-red-300 text-red-900 px-5 py-3" x-data="{ show: true }" x-init="setInterval(() => show = false, 5000)"
                        x-show="show">
                        {{ $message }}
                    </div>
                @enderror

                <form action="/addToBasket" method="post" class=" space-y-4 mt-5">
                    @csrf
                    <input type="hidden" name="productId" value="{{ $product[0]->id }}">
                    <input type="hidden" name="userId" value="{{ Auth::id() }}">
                    <h1 class="font-medium text-lg">{{ $product[0]->name }}</h1>
                    <h1 class="text-gray-500 text-sm">#{{ $product[0]->id }}</h1>
                    <h3>Stokta kalan adet {{ $product[0]->numberOfProducts }}</h3>
                    @if (Auth::check())
                        <button class="py-2 px-5 bg-orange-500 w-32 m-auto text-white">
                            Sepete Ekle
                        </button>
                    @else
                        <div class="py-2 px-5 bg-orange-500 w-32 cursor-not-allowed text-white">
                            Sepete Ekle
                        </div>
                    @endif

                    <div class="text-xs w-9/12 m-auto text-gray-700">
                        {{ $product[0]->description }}
                    </div>

                </form>

            </div>
        </div>
        <div class="w-1/4 px-2">
        </div>
    </div>
@endsection
