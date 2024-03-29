<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-K2WTSWL9');
        </script>
        <!-- End Google Tag Manager -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="マインクラフト統合版の.mcstructureを共有するサービスです。好きな建築をとってきたり、みたり、アップロードしたりできます。" />
        <meta name="keywords" content="マインクラフト,マイクラ,マイクラ統合版,MCBE,建築,ストラクチャーブロック,mcstructure" />

        <meta name="twitter:card" content="{{ $attributes->get('twitter_card_type') ?? 'summary' }}" />
        <meta name="twitter:site" content="@poscra_" />
        <meta name="twitter:domain" content="https://twitter.com/poscra_" />

        <meta property="og:url" content="{{ Request::url() }}" />
        <meta property="og:title" content="ポスクラ | {{ $title ?? '' }}" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="{{ $description ?? 'オリジナルの建築を投稿! 気に入った建築を自分の世界へ!' }}" />
        <meta property="og:image" content="{{ $eyecatch ?? Vite::asset('resources/images/eyecatch.png') }}" />

        <title>ポスクラ | {{ $title ?? '' }}</title>

        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2WTSWL9"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        @if (!isset($isEmbed))
            <div class="relative sm:flex sm:flex-col min-h-screen bg-center bg-mywhite">
                <div class="flex w-full justify-between items-center">
                    <div class="font-cpfont text-4xl ml-9 text-myaccent">
                        <a href="{{ url('/') }}">ポスクラ</a>
                    </div>
                    <div class="sm:top-0 sm:right-0 pr-7 mr-5 h-11 leading-10 my-10 text-mydark font-yusei">
                        @auth
                            <details class="dropdown dropdown-end">
                                <summary class="flex items-center cursor-pointer">
                                    <img class="mx-2" src="{{ Vite::asset('resources/images/icon_steve.png') }}" />
                                    <div>{{ auth()->user()->name }}</div>
                                </summary>
                                <ul class="p-2 shadow menu dropdown-content z-[1] bg-mywhite rounded-box w-52">
                                    <li><a href="{{ url('/dashboard') }}">ダッシュボード</a></li>
                                    <li>
                                        <a onclick="setting.show();">設定</a>
                                    </li>
                                    <li class="text-[#e66c51]" onclick="document.logout.submit()">
                                        <form name="logout" action="{{ route('logout') }}" method="post">
                                            @csrf
                                            ログアウト
                                        </form>
                                    </li>
                                </ul>
                            </details>
                            <dialog id="setting" class="modal">
                                <div class="modal-box max-w-[400px] bg-mywhite">
                                    <livewire:setting />
                                </div>
                                <form method="dialog" class="modal-backdrop bg-mydark/40">
                                    <button>close</button>
                                </form>
                            </dialog>
                        @else
                            <button class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 flex items-center !px-0" onclick="login_modal.show()">
                                <img class="mx-2" src="{{ Vite::asset('resources/images/accessibility_glyph_color.png') }}" />
                                ログイン / 登録
                            </button>
                            <dialog id="login_modal" class="modal">
                                <div class="modal-box max-w-[400px] bg-mywhite flex flex-col justify-center items-center h-[180px]">
                                    <a href="{{ route('google_auth') }}">
                                        <button type="button" class="font-sans text-mywhite bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                                            <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd"/>
                                            </svg>
                                            Sign in with Google
                                        </button>
                                    </a>
                                    <a href="{{ route('privacy-policy') }}" target="_blank" class="text-center font-yusei text-mydark mt-5"><i class="fa-solid fa-link"></i> プライバシーポリシー</a>
                                </div>
                                <form method="dialog" class="modal-backdrop bg-mydark/40">
                                    <button>close</button>
                                </form>
                            </dialog>
                        @endauth
                    </div>
                </div>
            @endif
            {{ $slot }}
            @if (!isset($isEmbed))
                <x-howtouse /> 
                <div class="flex justify-center py-10 font-yusei text-mydark items-center">
                    <div class="pr-5"><div><i class="fa-regular fa-copyright"></i> 2023 ポスクラ</div></div>
                    <div class=""><a href="https://discord.gg/nJ9AfGWWQA" target="_blank"><i class="fa-brands fa-discord text-[25px]"></i></a></div>
                    <div class="pl-5"><a href="{{ route('privacy-policy') }}" target="_blank" class="text-center font-yusei text-mydark"><i class="fa-solid fa-link"></i> プライバシーポリシー</a></div>
                </div>
            @endif
        </div>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        @livewireScripts
    </body>
</html>