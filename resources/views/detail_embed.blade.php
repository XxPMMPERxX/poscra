<x-layout.main 
    eyecatch="{{ url('/') }}{{ Storage::url($post->attachment->thumbnail) }}"
    twitter_card_type="summary_large_image"
    isEmbed="true"
>
    <style>
        html,body {
            width: 100%;
            height: 100%;
        }
    </style>
    <x-slot:title>{{ $post->title }}</x-slot:title>
    <x-slot:description>{{ $post->description }}</x-slot:description>
    <div class="flex flex-col h-full w-full">
        <canvas id="detail_mcstructure_preview_{{ str_replace('-', '_', $post->id) }}" class="!w-full !h-full"></canvas>
        <div class="w-full bg-mywhite h-[15%] flex items-center justify-between">
            <div class="font-yusei text-mydark text-[min(4vw,20px)] m-5">
                <a href="{{ route('detail', ['post_id' => $post->id]) }}" target="_blank">
                    {{ $post->title }} <span class="text-[min(2.5vw,15px)] font-sans">by {{ $post->user->name }}</span>
                </a>
            </div>
            <div class="font-cpfont text-[min(4vw,20px)] mx-5 text-myaccent">
                <a href="{{ url('/') }}" target="_blank">ポスクラ</a>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const canvas = document.getElementById("detail_mcstructure_preview_{{ str_replace('-', '_', $post->id) }}");
                    
            const renderer = new THREE.WebGLRenderer({
                canvas: canvas,
                antialias: true,
                preserveDrawingBuffer: true,
            });
            let width = canvas.getBoundingClientRect().width;
            let height = canvas.getBoundingClientRect().height;

            renderer.setPixelRatio(1);
            renderer.setSize(width, height);

            const scene = new THREE.Scene();

            const camera = new THREE.PerspectiveCamera(45, width / height, 1, 100000);
            camera.position.set(0, -5000, -20000);

            const controls = new OrbitControls(camera, canvas);

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
                width = canvas.getBoundingClientRect().width;
                height = canvas.getBoundingClientRect().height;

                renderer.setPixelRatio(window.devicePixelRatio);
                renderer.setSize(width, height);

                camera.aspect = width / height;
                camera.updateProjectionMatrix();
            }
        });
    </script>
</x-layout.main>