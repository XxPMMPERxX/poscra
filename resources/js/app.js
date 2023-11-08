import * as THREE from 'three';

import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader';
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";

window.THREE = THREE;
window.GLTFLoader = GLTFLoader;
window.OrbitControls = OrbitControls;
import './bootstrap';
import './modal';
import './edit_post';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);