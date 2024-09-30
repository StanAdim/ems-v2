import './bootstrap';
import 'flowbite';
import 'alpinejs';

import { Modal } from 'flowbite';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';
import focus from '@alpinejs/focus'
// import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';



import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

Alpine.plugin(focus);
Alpine.plugin(mask);
Alpine.start();

// Livewire.start()
