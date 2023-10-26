const dropzone = document.getElementById('dropzone');
const targetInput = document.getElementById('dropzone-file');
const thumbnailInput = document.getElementById('thumbnail_image'); // 
const setThumbnail = document.getElementById('set_thumbnail'); // button

const editModal = document.getElementById('new_post_modal');
const mcstructure = document.getElementById('structure');

const canvas = document.getElementById("mcstructure_preview");

/*const editSubmit = document.getElementById('edit_submit');

editSubmit.addEventListener('click',(ev) => {
    const previewImage = document.getElementById('preview_image');
    console.log(previewImage, !previewImage);
    if (!previewImage && targetInput.files.length != 0 && !setThumbnail.disabled) {
        confirm('サムネイルが設定されていません。そのまま続けますか？') || ev.stopImmediatePropagation()
    }
}, true);*/

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
});

window.addEventListener('update_preview', (ev) => {
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

