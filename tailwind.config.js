/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#141e2e',
        'secondary': "#0e1828"
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
