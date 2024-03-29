<div class="mt-7 flex justify-center">
    <button class="btn bg-mydark text-mywhite w-[140px] h-[35px] text-[15px] font-yusei hover:bg-mydark/80" onclick="new_post_modal.showModal()"><i class="fa-regular fa-square-plus"></i>新規追加</button>
    <dialog id="new_post_modal" class="modal" wire:ignore.self>
        <div class="modal-box max-w-[1190px] bg-mywhite">
            <form class="flex flex-col md:flex-row md:py-5 md:px-10 md:gap-[24px] gap-[10px]" wire:submit.prevent="save">
                <div class="md:w-3/5 w-full relative group">
                    @if ($attachment)
                        <div class="absolute z-10 top-[10px] right-[10px] group-hover:block hidden">
                            <button type="button" class="btn btn-square text-error bg-mywhite min-h-0" wire:click="clearAttachment">
                                <i class="fa-regular fa-trash-can text-xl"></i>
                            </button>
                        </div>
                    @endif
                    @if ($attachment_type === 'image')
                        <div>
                            <img id="preview_image" class="object-contain h-[220px] md:h-[430px]" src="{{ $attachment->temporaryUrl() }}" />
                        </div>
                    @endif
                    @if (!$attachment)
                        <label id="dropzone" for="dropzone-file" class="h-[220px] md:h-[430px] flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-mywhiet">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">サムネイル用 PNG, JPG or GLB</p>
                            </div>
                        </label>
                    @endif
                    <div class="absolute z-10 bottom-[10px] left-[10px] @if($attachment_type !== '3dmodel') hidden @endif">
                        <button type="button" class="btn bg-mywhite disabled:opacity-75 disabled:!bg-mywhite font-yusei text-mydark" id="set_thumbnail" wire:click="setThumbnail" wire:ignore.self>サムネイルとして設定</button>
                    </div>
                    <div id="main_canvas" class="relative w-full h-[220px] md:h-[430px] @if($attachment_type !== '3dmodel') hidden @endif">
                        <canvas id="mcstructure_preview" class="" wire:ignore.self></canvas>
                    </div>
                    <input id="dropzone-file" type="file" class="absolute h-[1px] w-[1px] opacity-0 top-[50%] left-[50%]" accept=".png,.jpeg,.jpg,.glb,model/gltf-binary" wire:model="attachment" name="attachment" required/>
                    <input id="thumbnail_image" type="file" name="thumbnail_image" wire:model="thumbnail" class="hidden" />
                </div>
                <div class="flex flex-col font-yusei text-mydark md:w-2/5 w-full">
                    <div class="flex items-end">
                        <label for="title" class="text-[] mt-5">タイトル</label>
                        @error('title')<span class="text-error">{{ $message }}</span>@enderror
                    </div>
                    <input class="w-full bg-mywhite border-mydark input input-bordered" id="title" name="title" type="text" wire:model="title" maxlength="20" required/>

                    <div class="flex items-end">
                        <label for="description" class="text-[] mt-3">説明</label>
                        @error('descrption')<span class="text-error">{{ $message }}</span>@enderror
                    </div>
                    <textarea class="textarea textarea-bordered w-full bg-mywhite border-mydark h-[90px]" id="description" name="description" maxlength="100" wire:model="description"></textarea>
                    <div class="flex items-end">
                        <label for="structure" class="text-[] mt-3">mcstructure</label>
                        <div class="tooltip" data-tip="*.mcstructureファイルはストラクチャーブロックによりエクスポートされたファイルです。 詳しい使い方の説明は省略します。">
                            <i class="fa-solid fa-circle-question mx-2 mb-1"></i>
                        </div>
                        @error('mcstructure_file_error')<span class="text-error">{{ $message }}</span>@enderror
                        @error('mcstructure')<span class="text-error">{{ $message }}</span>@enderror
                    </div>
                    <input type="file" class="file-input file-input-bordered w-full bg-mywhite input-mydark" id="structure" name="structure"  wire:model="mcstructure" accept=".mcstructure" required/>

                    @error('thumbnail')<span class="text-error">{{ $message }}</span>@enderror
                    @error('attachment')<span class="text-error">{{ $message }}</span>@enderror
                    @error('attachment_file_error')<span class="text-error">{{ $message }}</span>@enderror
                    <button id="edit_submit" wire:click="save" class="btn bg-mydark text-mywhite w-full text-[15px] font-yusei hover:bg-mydark/80 md:mt-auto mt-[20px]"><i class="fa-solid fa-paper-plane"></i>投稿</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    @script
    <script>
        (() => {
            const dropzone = document.getElementById('dropzone');
            const targetInput = document.getElementById('dropzone-file');
            const thumbnailInput = document.getElementById('thumbnail_image'); // 
            const setThumbnail = document.getElementById('set_thumbnail'); // button

            const editModal = document.getElementById('new_post_modal');
            const mcstructure = document.getElementById('structure');

            const canvas = document.getElementById("mcstructure_preview");
            const renderer = new THREE.WebGLRenderer({
                canvas: canvas,
                antialias: true,
                preserveDrawingBuffer: true,
            });
            let width = document.getElementById('main_canvas').getBoundingClientRect().width;
            let height = document.getElementById('main_canvas').getBoundingClientRect().height;
            renderer.setPixelRatio(1);
            renderer.setSize(width, height);

            const scene = new THREE.Scene();

            const camera = new THREE.PerspectiveCamera(45, width / height, 1, 100000);
            camera.position.set(0, -5000, -20000);

            const controls = new OrbitControls(camera, document.getElementById('main_canvas'));
            controls.addEventListener("change", function (ev) {
                setThumbnail.disabled = false;
            });


            if (!dropzone) return;
            dropzone.addEventListener('dragover', (ev) => {
                ev.preventDefault();
                //console.log(ev);
            });

            dropzone.addEventListener('dragleave', (ev) => {
                ev.preventDefault();
                //console.log(ev);
            });

            dropzone.addEventListener('drop', (ev) => {
                ev.preventDefault();

                const files = ev.dataTransfer.files;
                targetInput.files = files;

                const changeEvent = new Event('change');
                targetInput.dispatchEvent(changeEvent);
                
                //console.log(targetInput.files);
            });

            window.addEventListener('setThumbnail', (ev) => {
                //console.log(ev);
                setThumbnail.disabled = true;
                canvas.toBlob(function (blob) {
                    const file = new File([blob], 'thumbnail.png', { type: "image/png" });
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    thumbnailInput.files = dt.files;
                    thumbnailInput.dispatchEvent(new Event('change'));
                });
                $wire.$set(
                    'attachment_options',
                    {
                        position: camera.position,
                        rotation: camera.rotation,
                        zoom: camera.zoom,
                        target: controls.target
                    }
                );
            });

            window.addEventListener('update_preview', (ev) => {
                const loader = new GLTFLoader();
                const url = ev.detail.preview_url;

                let model = null;
                loader.load(
                    url,
                    function (gltf) {
                        model = gltf.scene;
                        model.name = "structure";
                        model.scale.set(400.0, 400.0, 400.0);
                        model.position.set(0, 0, 0);
                        scene.add(gltf.scene);
                        onResize();
                    },
                    function (xhr) {
                        console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );
                    },
                    function (error) {
                        console.error(error);
                    }
                );

                const light = new THREE.AmbientLight(0xFFFFFF, 5.0);

                light.position.set(1, 1, 1);
                scene.add(light);

                tick();
                function tick() {
                    controls.update();
                    renderer.render(scene, camera);
                    requestAnimationFrame(tick);
                }

                window.addEventListener('resize', onResize);
                function onResize() {
                    width = document.getElementById('main_canvas').getBoundingClientRect().width;
                    height = document.getElementById('main_canvas').getBoundingClientRect().height;

                    renderer.setPixelRatio(window.devicePixelRatio);
                    renderer.setSize(width, height);

                    camera.aspect = width / height;
                    camera.updateProjectionMatrix();
                    //console.log(width);
                }
            })
        })()
    </script>
    @endscript
</div>