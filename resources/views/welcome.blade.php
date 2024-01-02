<x-layout.main>
    <x-slot:title>トップページ</x-slot:title>
    <div class="relative">
        <div class="absolute flex flex-col text-mywhite font-yusei text-right text-[3vw] bottom-[20%] right-[40px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(0, 0, 0, 0.25);" >
            <p>オリジナルの建築を投稿!</p>
            <p>気に入った建築を自分の世界へ!</p>
        </div>
        <img class="w-full" src="{{ Vite::asset('resources/images/eyecatch.png') }}" />
    </div>
    <div id="trend" class="mt-10">
        <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px] flex items-center justify-center" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
            トレンド
        </div>
        @if (count($trend_posts) === 0)<div class="flex justify-center font-yusei my-10">ここには人気の投稿が表示されます</div> @endif
        <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">
            @foreach($trend_posts as $trend_post)
                <div class="carousel-item sm:mx-[12px] mx-[5px] relative cursor-pointer hover:opacity-70 duration-500">
                    <div class="absolute text-mydark font-yusei sm:text-[14px] bg-myaccent sm:w-[34px] sm:h-[26px] text-center sm:leading-[26px] rounded-tl-[20px] text-[10px] w-[25px] h-[18px] leading-[18px]">{{ $loop->index + 1 }}位</div>
                    <img onclick="openModal('{{ $modal_provider->getModalId($trend_post) }}', '{{ $trend_post->id }}', '{{ $trend_post->title }}')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Storage::url($trend_post->attachment->thumbnail) }}" />
                </div>
            @endforeach
        </div>
    </div>
    <div id="new" class="mt-5">
        <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px] flex items-center justify-center" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
            新着
        </div>
        @if (count($new_posts) === 0)<div class="flex justify-center font-yusei my-10">ここには新着の投稿が表示されます</div> @endif
        <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">
            @foreach($new_posts as $new_post)
                <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
                    <img onclick="openModal('{{ $modal_provider->getModalId($new_post) }}', '{{ $new_post->id }}', '{{ $new_post->title }}')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Storage::url($new_post->attachment->thumbnail) }}" />
                </div>
            @endforeach
        </div>
    </div>
    <div id="contents" class="mt-10">
        <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">投稿一覧</div>
        @if (count($posts) === 0)<div class="flex justify-center font-yusei my-10">ここには全ての投稿が表示されます</div> @endif
        <div class="flex flex-wrap md:max-w-[925px] max-w-[310px] mx-auto justify-around">
            @foreach ($posts as $post)
                <div class="card card-compact w-[450px] bg-mywhite shadow-xl mb-5 hover:opacity-70 duration-500" onclick="openModal('{{ $modal_provider->getModalId($post) }}', '{{ $post->id }}', '{{ $post->title }}')">
                    <figure class="md:h-[225px] h-[155px]"><img class="object-cover w-full" src="{{ Storage::url($post->attachment->thumbnail) }}" alt="" /></figure>
                    <div class="card-body text-mydark font-yusei md:h-[90px] h-[60px] md:!pt-[12px] !pt-[5px] !gap-0">
                        <h2 class="card-title text-[16px] md:text-[24px] !mb-0 md:!mb-[10px] truncate">{{ $post->title }}</h2>
                        <div class="flex justify-between text-[12px] md:text-[16px]">
                            <div>投稿日: {{ $post->created_at->format('Y/m/d') }}</div>
                            <div>クリエイター: {{ $post->user->name }}</div>
                        </div>
                    </div>
                </div>
                <dialog id="{{ $modal_provider->getModalId($post) }}" class="modal">
                    <x-datail :post="$post" isModal="true" />
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            @endforeach
            <div class="card card-compact w-[450px] h-[210px] mb-5">
                <!--<button class="btn bg-mydark text-mywhite font-yusei hover:opacity-75 hover:bg-mydark width-[50%] mx-auto my-auto">もっと表示する</button>-->
            </div>
        </div>
    </div>
</x-layout.main>
