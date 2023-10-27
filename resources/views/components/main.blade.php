<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4660X3QQPP"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-4660X3QQPP');
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ポスクラ | トップページ</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:flex-col min-h-screen bg-center bg-mywhite">
            <div class="flex w-full justify-between items-center">
                <div class="font-cpfont text-4xl ml-9 text-myaccent">
                    <a href="{{ url('/') }}">ポスクラ</a>
                </div>
                <div class="sm:top-0 sm:right-0 pr-7 mr-7 h-11 leading-10 my-10 text-mydark font-yusei">
                    @auth
                        <details class="dropdown dropdown-end">
                            <summary class="flex items-center cursor-pointer">
                                <img class="mx-2" src="{{ Vite::asset('resources/images/icon_steve.png') }}" />
                                <div>{{ auth()->user()->name }}</div>
                            </summary>
                            <ul class="p-2 shadow menu dropdown-content z-[1] bg-mywhite rounded-box w-52">
                                <li><a href="{{ url('/dashboard') }}">ダッシュボード</a></li>
                                <li><a>設定</a></li>
                                <li class="text-[#e66c51]"><a>ログアウト</a></li>
                            </ul>
                        </details>
                    @else
                        <a href="{{ route('google_auth') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 flex items-center">
                            <img class="mx-2" src="{{ Vite::asset('resources/images/accessibility_glyph_color.png') }}" />
                            ログイン / 登録
                        </a>
                    @endauth
                </div>
            </div>
            {{ $slot }}
            <div class="flex justify-center my-10 font-yusei text-mydark divide-x-2 divide-mydark/25 items-center">
                <div class="w-2/4 flex justify-end pr-5"><div><i class="fa-regular fa-copyright"></i> 2023 ポスクラ</div></div>
                <div class="w-2/4 flex justify-start pl-5"><a href=""><i class="fa-brands fa-x-twitter text-[30px]"></i></a></div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>