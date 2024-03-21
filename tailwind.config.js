import daisyui from 'daisyui'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './app/Livewire/**/*.php',
    './resources/js/**/*.js'
],
  theme: {
    extend: {
        fontFamily: {
            'questrial': ['Questrial', 'sans-serif']
        }
    },
  },
  plugins: [daisyui],
}

