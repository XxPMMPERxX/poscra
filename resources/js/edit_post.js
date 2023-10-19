import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls"

const dropzone = document.getElementById('dropzone');
const targetInput = document.getElementById('dropzone-file');
const thumbnailInput = document.getElementById('thumbnail_image');
const setThumbnail = document.getElementById('set_thumbnail');
const canvas = document.getElementById("mcstructure_preview");


targetInput.addEventListener('change', (ev) => {
    console.log(ev);
});

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
    // ウィンドウサイズ設定
    let width = document.getElementById('main_canvas').getBoundingClientRect().width;
    let height = document.getElementById('main_canvas').getBoundingClientRect().height;
    renderer.setPixelRatio(1);
    renderer.setSize(width, height);
    //console.log(window.devicePixelRatio);
    //console.log(width + ", " + height);

    // シーンを作成
    const scene = new THREE.Scene();

    // カメラを作成
    const camera = new THREE.PerspectiveCamera(45, width / height, 1, 100000);
    camera.position.set(0, 3000, -12000);

    const controls = new OrbitControls(camera, document.getElementById('main_canvas'));
    controls.addEventListener("change", function (ev) {
        setThumbnail.disabled = false;
    });
    //camera.lookAt(new THREE.Vector3(0, 400, 0));

    // Load GLTF or GLB
    const loader = new GLTFLoader();
    const url = ev.detail.preview_url;

    //console.log(url);
    let model = null;
    loader.load(
        url,
        function (gltf) {
            model = gltf.scene;
            model.name = "model_with_cloth";
            model.scale.set(400.0, 400.0, 400.0);
            model.position.set(0, -5000, 0);
            scene.add(gltf.scene);
            // 初期化のために実行
            onResize();
        },
        function (xhr) {
            //console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );
        },
        function (error) {
            //console.log('An error happened');
            console.error(error);
        }
    );

    // 平行光源
    const light = new THREE.AmbientLight(0xFFFFFF, 5.0);
    /*light.intensity = 2; */
    light.position.set(1, 1, 1);
    // シーンに追加
    scene.add(light);

    // 初回実行
    tick();
    function tick() {
        controls.update();
        renderer.render(scene, camera);
        requestAnimationFrame(tick);
    }

    // リサイズイベント発生時に実行
    window.addEventListener('resize', onResize);
    function onResize() {
        // サイズを取得
        width = document.getElementById('main_canvas').getBoundingClientRect().width;
        height = document.getElementById('main_canvas').getBoundingClientRect().height;

        // レンダラーのサイズを調整する
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(width, height);

        // カメラのアスペクト比を正す
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        //console.log(width);
    }
})

