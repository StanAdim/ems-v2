import forms from '@tailwindcss/forms';

const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['IBM Plex Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                    'primary': { DEFAULT: '#0DA3DE', 50: '#A9E3FA', 100: '#95DDF9', 200: '#6FD0F7', 300: '#48C4F4', 400: '#22B7F2', 500: '#0DA3DE', 600: '#0A7CA9', 700: '#075574', 800: '#042E3F', 900: '#01070A', 950: '#000000' },
                    'secondary': { DEFAULT: '#F7D31D', 50: '#FDF6CE', 100: '#FDF2BB', 200: '#FBEA93', 300: '#FAE26C', 400: '#F8DB44', 500: '#F7D31D', 600: '#D4B308', 700: '#9E8506', 800: '#685704', 900: '#322A02', 950: '#171301' },
                    'alternate': {
                        'DEFAULT': '#D60A0A',
                        '50': '#fff1f1',
                        '100': '#ffdfdf',
                        '200': '#ffc4c4',
                        '300': '#ff9b9b',
                        '400': '#ff6161',
                        '500': '#ff3030',
                        '600': '#f11111',
                        '700': '#d60a0a',
                        '800': '#a80c0c',
                        '900': '#8b1111',
                        '950': '#4c0303',
                    },
                    'alt-green': {
                        'DEFAULT': '#38AC3D',
                    },
                    'brand': {
                        'DEFAULT': '#121D38;',
                        '50': '#f0f7fe',
                        '100': '#ddecfc',
                        '200': '#c2defb',
                        '300': '#98cbf8',
                        '400': '#68aef2',
                        '500': '#448eed',
                        '600': '#2f72e1',
                        '700': '#265ccf',
                        '800': '#254ca8',
                        '900': '#234385',
                        '950': '#121d38',
                    },

                }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
