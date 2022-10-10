/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        primary: "#9E3216",
        secondary: "#921C06",
        terciary: "#BE7663",
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
  darkMode:'class'
}
