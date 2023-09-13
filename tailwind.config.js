import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
       './vendor/laravel/jetstream/**/*.blade.php',
       './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
      /*  './resources/views/layouts/*.blade.php',*/
    ],
    theme: {
        extend: {
            margin:{
             '144': '12rem',
            },
            height:{
              'one': '65vh',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
