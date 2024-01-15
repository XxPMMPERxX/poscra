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

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K2WTSWL9"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
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
            {{ $slot }}
            <div
              class="fixed bottom-[50px] right-[20px] w-[70px] h-[70px] rounded-full bg-myaccent text-center animate-bounce shadow-md opacity-[0.6] hover:opacity-[1.0] hover:cursor-pointer"
              onclick="how_to_use.show()"
            >
                <img src="{{ Vite::asset('resources/images/pickel.png') }}" class="w-[40px] h-[40px] mx-auto mt-[5px] mb-[-10px]" />
                <span class="text-mywhite font-yusei text-[12px]">つかいかた</span>
            </div>
            <dialog id="how_to_use" class="modal">
                <div class="modal-box bg-mywhite max-w-[1190px] max-h-[80%] bg-mywhite flex flex-col gap-5 text-mydark font-yusei md:divide-none divide-y divide-gray-200">
                    <h1 class="text-[20px]">つかいかた（投稿までの道のり）</h1>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft1.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>①ワールド生成する</li>
                                <li>ワールドタイプはフラットの方がおすすめです</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft2.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>②建築する</li>
                                <li>思うまま、好きなように建築しましょう！</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft3.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>③建築完成！！</li>
                                <li>素晴らしい建築ができました（豆腐？はて....）</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft4.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>④-1 ストラクチャーブロックの取得</li>
                                <li>建築のエクスポートにはストラクチャーブロックを使います</li>
                                <li>ストラクチャーブロックは <span class="bg-slate-300 font-sans">/give @s structure_block 1</span> というコマンドで手に入れられます</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft6.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>④-2 ストラクチャーブロックの取得</li>
                                <li>画像のインベントリの一番右のブロックがストラクチャーブロックです</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft8.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑤-1 建築のエクスポート（mcstructureファイル）</li>
                                <li>ストラクチャーブロックを建築物の角の延長に設置します</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/minecraft7.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑤-2 建築のエクスポート（mcstructureファイル）</li>
                                <li>エクスポートする建築の名前と領域（はんい）を設定します</li>
                                <li>モードは複数ありますが、「保存」で良いです</li>
                                <li>範囲設定はわかりにくいかもしれませんが、⑤-1 の画像の白い線が出力したい建築をカバーできればokです</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/structure_guide1.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑤-3 建築のエクスポート（mcstructureファイル）</li>
                                <li>設定後、エクスポートボタンを押すと画像のようにファイルの出力先を選択する画面が出てくるのでお好きな場所に保存</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/structure_guide2.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑥建築の3Dモデルのエクスポート（glbファイル）</li>
                                <li>設定後、モードを「3D エクスポート」に変更</li>
                                <li>再度エクスポートボタンを押すとファイルの保存先の選択画面が出るのでお好きなところで保存</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide2.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑦-1 建築の投稿</li>
                                <li><span class="font-sans cursor-pointer" onclick="window.open('/dashboard')">ダッシュボード</span> にアクセス</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide3.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑦-2 建築の投稿</li>
                                <li>新規追加ボタンを押すと画像のモーダルが表示されます</li>
                                <li>左側の大きい領域をクリックか、直接ファイルをドラッグアンドドロップで 先ほど出力した「glbファイル」をアップロード</li>
                                <li>右側の mcstructure のファイル選択ボタンをクリックして、先ほど出力した「mcstructureファイル」をアップロード</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide4.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑦-3 建築の投稿</li>
                                <li>ファイルのアップロードができると画像のようになります</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide5.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑦-4 建築の投稿</li>
                                <li>3Dモデルはマウス操作で角度や大きさなどを調整でき、良いと思ったら「サムネイルとして設定」を押します</li>
                                <li>タイトルと説明を記載します</li>
                                <li>全て問題なければ「投稿」ボタンをおして投稿!!</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex gap-2.5">
                        <img src="{{ Vite::asset('resources/images/how_to_use/poscra_guide6.png') }}" class="w-1/2 object-contain" />
                        <div class="w-1/2">
                            <ul>
                                <li>⑦-5 建築の投稿</li>
                                <li>投稿が完了すると「あなたの投稿一覧」に投稿が表示されます</li>
                                <li>お疲れ様でした！！！</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop bg-mydark/40">
                    <button>close</button>
                </form>
            </dialog>
            <div class="flex justify-center py-10 font-yusei text-mydark items-center">
                <div class="pr-5"><div><i class="fa-regular fa-copyright"></i> 2023 ポスクラ</div></div>
                <div class=""><a href="https://discord.gg/nJ9AfGWWQA" target="_blank"><i class="fa-brands fa-discord text-[25px]"></i></a></div>
                <div class="pl-5"><a href="{{ route('privacy-policy') }}" target="_blank" class="text-center font-yusei text-mydark"><i class="fa-solid fa-link"></i> プライバシーポリシー</a></div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>