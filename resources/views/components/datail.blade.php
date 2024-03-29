<div class="modal-box max-w-[1190px] bg-mywhite @if($isModal === 'false') !max-h-none @endif">
    <form class="flex flex-col md:flex-row md:py-5 md:px-10 md:gap-[24px] gap-[10px]">
        <div class="md:w-3/5 w-full relative group">
            @if ($post->attachment->attachment_type == 'image')
                <div class="flex justify-center">
                    <img id="detail_preview_image_{{ str_replace('-', '_', $post->id) }}" class="object-contain h-[220px] md:h-[430px]" src="{{ Storage::url($post->attachment->attachment) }}">
                </div>
            @else
                <div id="detail_main_canvas_{{ str_replace('-', '_', $post->id) }}" class="w-full h-[220px] md:h-full md:max-h-[500px]">
                    <canvas id="detail_mcstructure_preview_{{ str_replace('-', '_', $post->id) }}" class="!w-full !h-full rounded-lg"></canvas>
                </div>
                <script>
                    (() => {
                        window.addEventListener('show_modal', (ev) => {
                            if (ev.detail !== "{{ $post->id }}") return;
                            const canvas = document.getElementById("detail_mcstructure_preview_{{ str_replace('-', '_', $post->id) }}");
                    
                            const renderer = new THREE.WebGLRenderer({
                                canvas: canvas,
                                antialias: true,
                                preserveDrawingBuffer: true,
                            });
                            let width = document.getElementById("detail_main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().width;
                            let height = document.getElementById("detail_main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().height;
                            console.log(width,height);
                
                            renderer.setPixelRatio(1);
                            renderer.setSize(width, height);
                
                            const scene = new THREE.Scene();
                
                            const camera = new THREE.PerspectiveCamera(45, width / height, 1, 100000);
                            camera.position.set(0, -5000, -20000);
                
                            const controls = new OrbitControls(camera, document.getElementById('detail_main_canvas_{{ str_replace('-', '_', $post->id) }}'));
                
                            const loader = new GLTFLoader();
                            const options = {{ Js::From(json_decode($post->attachment->attachment_options)) }}
                
                            if (options) {
                                camera.position.set(options.position.x, options.position.y, options.position.z);
                                camera.rotation.set(options.rotation.x, options.rotation.y, options.rotation.z)
                                camera.zoom = options.zoom;

                                controls.target.x = options.target.x;
                                controls.target.y = options.target.y;
                                controls.target.z = options.target.z;
                            }
                            const url = "{{ Storage::url($post->attachment->attachment) }}";
                
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
                                width = document.getElementById("detail_main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().width;
                                height = document.getElementById("detail_main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().height;
                
                                renderer.setPixelRatio(window.devicePixelRatio);
                                renderer.setSize(width, height);
                
                                camera.aspect = width / height;
                                camera.updateProjectionMatrix();
                            }
                        });
                        let isModal = {{ $isModal }};
                        if (!isModal) {
                            window.addEventListener('load', () => {
                                dispatchEvent(new CustomEvent('show_modal', {detail: "{{ $post->id }}"}));
                            })
                        }
                    })();
                </script>
            @endif
        </div>
        <div class="flex flex-col font-yusei text-mydark md:w-2/5 w-full">
            <div class="flex items-end font-yusei text-[24px] mb-[15px]">
                {{ $post->title }}
            </div>
            <div class="mb-[5px] flex items-center gap-[5px]">
                <a 
                  href="https://twitter.com/share?ref_src=twsrc%5Etfw" 
                  class="twitter-share-button" 
                  data-text="【{{ $post->title }}】by {{ $post->user->name }} &#010;{{ $post->description }}&#010;" 
                  data-hashtags="マイクラ統合版,建築,ポスクラ" 
                  data-show-count="false" 
                  data-url="https://poscra.com/post/{{ $post->id }}">
                    Tweet
                </a>
                @if ($post->attachment->attachment_type === "3dmodel")
                    <button type="button" id="clip_{{ str_replace('-', '_', $post->id) }}" class="btn btn-xs btn-warning text-mywhite">埋め込み</button>
                    <script>
                        (() => {
                            let btn = document.getElementById("clip_{{ str_replace('-', '_', $post->id) }}");
                            btn.onclick = () => {
                                let text = "<iframe src=\"{{ route('detail_embed', ['post_id' => $post->id]) }}\" width=\"500\" height=\"300\"></iframe>";
                                navigator.clipboard.writeText(text).then(() => alert('埋め込みタグをコピーしました'));
                            }
                        })();
                    </script>
                @endif
            </div>
            <div class="flex font-yusei border-b-[1px] justify-between mb-[10px]">
                <div>投稿日:</div>
                <div>{{ $post->created_at->format('Y/m/d') }}</div>
            </div>
            <div class="flex font-yusei border-b-[1px] justify-between mb-[10px]">
                <div>クリエイター:</div>
                <div>{{ $post->user->name }}</div>
            </div>
            <div class="flex flex-col font-yusei mb-[10px]">
                <div>structure名</div>
                <input class="input input-bordered bg-mywhite" type="text" value="{{ $post->attachment->structure_name }}" readonly />
            </div>
            <div class="flex flex-col font-yusei mb-[13px]">
                <div>説明</div>
                <textarea class="textarea textarea-bordered bg-mywhite" readonly>{{ $post->description }}</textarea>
            </div>
            <button type="button" class="btn bg-mydark text-mywhite font-yusei hover:mydark/80 mb-[10px]" onclick="window.open('/post/{{ $post->id }}/download', '_blank')">ダウンロード</button>
            @guest<div class="tooltip tooltip-open tooltip-bottom tooltip-accent" data-tip="ログインするとお気に入り登録できます">@endguest
                <livewire:favorite-button :post_id="$post->id" />
            @guest</div>@endguest
        </div>
    </form>
</div>
    