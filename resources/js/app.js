import './bootstrap';
import 'flowbite';
import 'alpinejs';
import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';
// import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';



import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

Alpine.plugin(mask);
Alpine.start();

// Livewire.start()
