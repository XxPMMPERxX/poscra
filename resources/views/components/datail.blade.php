<div class="modal-box max-w-[1190px] bg-mywhite">
    <form class="flex flex-col md:flex-row md:py-5 md:px-10 md:gap-[24px] gap-[10px]">
        <div class="md:w-3/5 w-full relative group">
            @if ($post->attachment->attachment_type == 'image')
                <img id="preview_image_{{ str_replace('-', '_', $post->id) }}" class="object-contain h-[220px] md:h-[430px]" src="{{ Storage::url($post->attachment->attachment) }}">
            @else
                <div id="main_canvas_{{ str_replace('-', '_', $post->id) }}" class="w-full h-[220px] md:h-[430px]">
                    <canvas id="mcstructure_preview_{{ str_replace('-', '_', $post->id) }}" class=""></canvas>
                </div>
                <script>
                    window.addEventListener('show_modal', (ev) => {
                        if (ev.detail !== "{{ $post->id }}") return;
                        const canvas = document.getElementById("mcstructure_preview_{{ str_replace('-', '_', $post->id) }}");
                
                        const renderer = new THREE.WebGLRenderer({
                            canvas: canvas,
                            antialias: true,
                            preserveDrawingBuffer: true,
                        });
                        let width = document.getElementById("main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().width;
                        let height = document.getElementById("main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().height;
                        console.log(width,height);
            
                        renderer.setPixelRatio(1);
                        renderer.setSize(width, height);
            
                        const scene = new THREE.Scene();
            
                        const camera = new THREE.PerspectiveCamera(45, width / height, 1, 100000);
                        camera.position.set(0, -5000, -20000);
            
                        const controls = new OrbitControls(camera, document.getElementById('main_canvas_{{ str_replace('-', '_', $post->id) }}'));
            
                        const loader = new GLTFLoader();
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
                            width = document.getElementById("main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().width;
                            height = document.getElementById("main_canvas_{{ str_replace('-', '_', $post->id) }}").getBoundingClientRect().height;
            
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
                </script>
            @endif
        </div>
        <div class="flex flex-col font-yusei text-mydark md:w-2/5 w-full">
            <div class="flex items-end font-yusei text-[24px] mb-[19px]">
                {{ $post->title }}
            </div>
            <div class="flex font-yusei border-b-[1px] justify-between mb-[13px]">
                <div>投稿日:</div>
                <div>{{ $post->created_at->format('Y/m/d') }}</div>
            </div>
            <div class="flex font-yusei border-b-[1px] justify-between mb-[13px]">
                <div>クリエイター:</div>
                <div>{{ $post->user->name }}</div>
            </div>
            <div class="flex flex-col font-yusei mb-[13px]">
                <div>structure名</div>
                <input class="input input-bordered bg-mywhite" type="text" value="{{ $post->attachment->structure_name }}" readonly />
            </div>
        </div>
    </form>
</div>
    