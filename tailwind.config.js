/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js'),
    ],
    content: [
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}

