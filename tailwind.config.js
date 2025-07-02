import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#dc2626',
                secondary: '#b91c1c',
                light: '#f8fafc',
                dark: '#1e293b',
                accent: '#ef4444'
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            }
        }
    },

    plugins: [forms],
};
