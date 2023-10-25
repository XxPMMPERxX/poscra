<x-main>
    <div id="favorite" class="mt-5">
        <div class="font-yusei lg:text-[2vw] text-mydark text-center mb-5 text-[20px]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
            お気に入りの投稿一覧
        </div>
        <div class="carousel ml-[24px] 2xl:w-[1390px] 2xl:mx-auto 2xl:flex">
            <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
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
            <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
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
            <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
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
            <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
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
            <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
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
            <div class="carousel-item sm:mx-[12px] mx-[5px] cursor-pointer hover:opacity-70 duration-500">
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
</x-main>