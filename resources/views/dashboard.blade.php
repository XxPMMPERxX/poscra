<x-layout.main>
    <x-slot:title>ダッシュボード</x-slot:title>
    <div id="favorite" class="mt-5">
        <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
            お気に入りの投稿一覧
        </div>
        <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">

            @foreach(auth()->user()->favorites()->get() as $favorite)
                <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
                    <img onclick="openModal('datail_modal_{{ str_replace('-', '_', $favorite->post()->first()->id) }}', '{{ $favorite->post()->first()->id }}', '{{ $favorite->post()->first()->title }}')" class="sm:w-[330px] sm:h-[185px] rounded-[20px] w-[178px] h-[100px]" src="{{ Storage::url($favorite->post()->first()->attachment->thumbnail) }}" />
                </div>
                <dialog id="datail_modal_{{ str_replace('-', '_', $favorite->post()->first()->id) }}" class="modal">
                    <x-datail :post="$favorite->post()->first()" isModal="true" />
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            @endforeach
        </div>
    </div>
    <div id="mypost" class="mt-5">
        <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
            あなたの投稿一覧
        </div>
        <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">
            @foreach($myposts as $mypost)
                <livewire:edit-post :post="$mypost" :wire:key="$mypost->id" />
            @endforeach
        </div>
    </div>
    <livewire:create-post />
</x-layout.main>