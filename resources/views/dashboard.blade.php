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
    <div class="mt-7 flex justify-center">
        <button class="btn bg-mydark text-mywhite w-[140px] h-[35px] text-[15px] font-yusei" onclick="new_post_modal.showModal()"><i class="fa-regular fa-square-plus"></i>新規追加</button>
        <dialog id="new_post_modal" class="modal">
            <div class="modal-box max-w-[1190px] flex py-5 px-10 gap-[24px] bg-mywhite">
                <div class="flex items-center justify-center w-3/5">
                    <label for="dropzone-file" class="h-[430px] flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-mywhiet">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GLB (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                <div class="flex flex-col font-yusei text-mydark w-2/5">
                    <label for="title" class="text-[] mt-5">タイトル</label>
                    <input class="w-full bg-mywhite border-mydark input input-bordered" id="title" name="title" type="text" />
                    <label for="description" class="text-[] mt-3">説明</label>
                    <textarea class="textarea textarea-bordered w-full bg-mywhite border-mydark h-[90px]" id="description" name="description"></textarea>
                    <div class="flex items-end">
                        <label for="structure" class="text-[] mt-3">mcstructure</label>
                        <div class="tooltip" data-tip="*.mcstructureファイルはストラクチャーブロックによりエクスポートされたファイルです。 詳しい使い方の説明は省略します。">
                            <i class="fa-solid fa-circle-question mx-2 mb-1"></i>
                        </div>
                    </div>
                    <input type="file" class="file-input file-input-bordered w-full bg-mywhite border-mydark" id="structure" name="structure" />
                </div>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>  
</x-main>