<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OnlinePsikolog.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
</head>

<body>

    <nav class="sticky  top-0 w-full h-16 flex justify-around items-center bg-sky-700">
        <a href="/">
            <span class="text-lg font-medium text-white">OnlinePsikolog.com</span>
        </a>
        @if (Auth::check())
            <div class="flex gap-3">
                <span class="text-white">
                    <a href="{{route('user_main')}}">Hesabım</a>
                </span>
                <span class="text-white">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="text-red-300 font-medium">Çıkış Yap</button>
                    </form>
                </span>
                <span>
                    <a href="/basket">
                        <img src="{{asset('images/shoppingbug.png')}}" alt="">
                    </a>
                </span>

            </div>
        @else
            <span class="text-white">
              @csrf
                <a href="/login">Login</a>
            </span>
        @endif
    </nav>

    <div class="w-9/12 m-auto mt-3">
        @yield('content')
    </div>




    <script>
        tailwind.config = {
            theme: {
                extend: {
                    height: {
                        'card_post': '375px'
                    }
                }
            }
        }
    </script>

    <footer class="w-full h-12 flex justify-center items-center bg-white text-gray-800 text-sm mt-3">
        Bu site&nbsp;<a href="https://www.onlinepsikolog.com" target="__blank"
            class="text-sky-800 font-medium">onlinepsikolog.com</a>&nbsp;için tasarlanmıştır
    </footer>
</body>

</html>
