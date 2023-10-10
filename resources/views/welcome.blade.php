<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ポスクラ | トップページ</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:flex-col min-h-screen bg-center bg-mywhite">

            <div class="flex w-full justify-between items-center">
                <div class="font-cpfont text-4xl ml-9 text-myaccent">ポスクラ</div>
                <div class="sm:top-0 sm:right-0 pr-7 mr-7 h-11 leading-10 my-10 text-mydark font-yusei">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 flex items-center">
                            <img class="mx-2" src="{{ Vite::asset('resources/images/icon_steve.png') }}" />
                            <div>{{ auth()->user()->name }}</div>
                        </a>
                    @else
                        <a href="{{ route('google_auth') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン / 登録</a>
                    @endauth
                </div>
            </div>
            <div class="relative">
                <div class="absolute flex flex-col text-mywhite font-yusei text-right text-[3vw] bottom-[20%] right-[40px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);" >
                    <p>オリジナルの建築を投稿!</p>
                    <p>気に入った建築を自分の世界へ!</p>
                </div>
                <img class="w-full" src="{{ Vite::asset('resources/images/eyecatch.png') }}" />
            </div>
            <div id="trend" class="mt-10">
                <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">トレンド</div>
                <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">
                    <!-- Open the modal using ID.showModal() method -->
                    <div class="carousel-item sm:mx-[12px] mx-[5px] relative cursor-pointer">
                        <div class="absolute text-mydark font-yusei sm:text-[14px] bg-myaccent sm:w-[34px] sm:h-[26px] text-center sm:leading-[26px] rounded-tl-[20px] text-[10px] w-[25px] h-[18px] leading-[18px]">1位</div>
                        <img onclick="openModal('my_modal_1', 'test123123', 'test')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="carousel-item sm:mx-[12px] mx-[5px] relative cursor-pointer">
                        <div class="absolute text-mydark font-yusei sm:text-[14px] bg-myaccent sm:w-[34px] sm:h-[26px] text-center sm:leading-[26px] rounded-tl-[20px] text-[10px] w-[25px] h-[18px] leading-[18px]">2位</div>
                        <img onclick="openModal('my_modal_2', 'test1231233', 'test2')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_2" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="carousel-item sm:mx-[12px] mx-[5px] relative cursor-pointer">
                        <div class="absolute text-mydark font-yusei sm:text-[14px] bg-myaccent sm:w-[34px] sm:h-[26px] text-center sm:leading-[26px] rounded-tl-[20px] text-[10px] w-[25px] h-[18px] leading-[18px]">3位</div>
                        <img onclick="openModal('my_modal_3', 'test1231233', 'test3')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_3" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="carousel-item sm:mx-[12px] mx-[5px] relative cursor-pointer">
                        <div class="absolute text-mydark font-yusei sm:text-[14px] bg-myaccent sm:w-[34px] sm:h-[26px] text-center sm:leading-[26px] rounded-tl-[20px] text-[10px] w-[25px] h-[18px] leading-[18px]">4位</div>
                        <img onclick="openModal('my_modal_4', 'test12312334', 'test4')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                </div>
            </div>
            <div id="new" class="mt-5">
                <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">新着</div>
                <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">
                    <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer">
                        <img onclick="openModal('my_modal_10', 'test123123', 'test')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_10" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer">
                        <img onclick="openModal('my_modal_2', 'test1231233', 'test2')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_2" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer">
                        <img onclick="openModal('my_modal_3', 'test1231233', 'test3')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_3" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer">
                        <img onclick="openModal('my_modal_4', 'test12312334', 'test4')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" />
                    </div>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box max-w-none" style="max-width: 1190px;height: 585px;">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click outside to close</p>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                </div>
            </div>
            <div id="new" class="mt-10">
                <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">投稿一覧</div>
                <div class="flex flex-wrap md:max-w-[925px] max-w-[310px] mx-auto justify-around">
                    <div class="card card-compact w-[450px] bg-mywhite shadow-xl mb-5">
                        <figure><img src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" alt="Shoes" /></figure>
                        <div class="card-body text-mydark font-yusei md:h-[90px] h-[60px] md:!pt-[12px] !pt-[8px] !gap-0">
                            <h2 class="card-title text-[16px] md:text-[24px] !mb-0 md:!mb-[10px]">和風ビル（内装は無いそうです）</h2>
                            <div class="flex justify-between text-[12px] md:text-[16px]">
                                <div>投稿日: 2021/01/01</div>
                                <div>クリエイター: soradore</div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-compact w-[450px] bg-mywhite shadow-xl mb-5">
                        <figure><img src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" alt="Shoes" /></figure>
                        <div class="card-body text-mydark font-yusei md:h-[90px] h-[60px] md:!pt-[12px] !pt-[8px] !gap-0">
                            <h2 class="card-title text-[16px] md:text-[24px] !mb-0 md:!mb-[10px]">和風ビル（内装は無いそうです）</h2>
                            <div class="flex justify-between text-[12px] md:text-[16px]">
                                <div>投稿日: 2021/01/01</div>
                                <div>クリエイター: soradore</div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-compact w-[450px] bg-mywhite shadow-xl mb-5">
                        <figure><img src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" alt="Shoes" /></figure>
                        <div class="card-body text-mydark font-yusei md:h-[90px] h-[60px] md:!pt-[12px] !pt-[8px] !gap-0">
                            <h2 class="card-title text-[16px] md:text-[24px] !mb-0 md:!mb-[10px]">和風ビル（内装は無いそうです）</h2>
                            <div class="flex justify-between text-[12px] md:text-[16px]">
                                <div>投稿日: 2021/01/01</div>
                                <div>クリエイター: soradore</div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-compact w-[450px] bg-mywhite shadow-xl mb-5">
                        <figure><img src="{{ Vite::asset('resources/images/default_thumbnail.png') }}" alt="Shoes" /></figure>
                        <div class="card-body text-mydark font-yusei md:h-[90px] h-[60px] md:!pt-[12px] !pt-[8px] !gap-0">
                            <h2 class="card-title text-[16px] md:text-[24px] !mb-0 md:!mb-[10px]">和風ビル（内装は無いそうです）</h2>
                            <div class="flex justify-between text-[12px] md:text-[16px]">
                                <div>投稿日: 2021/01/01</div>
                                <div>クリエイター: soradore</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
