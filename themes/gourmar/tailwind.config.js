/** @type {import('tailwindcss').Config} */
module.exports = {
  content: require('fast-glob').sync(['**/*.php']),
  theme: {
    extend: {},
  },
  plugins: [],
}

