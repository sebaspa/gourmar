/** @type {import('tailwindcss').Config} */
module.exports = {
  content: require('fast-glob').sync(['**/*.php', '../../plugins/gourmar/**/*.php']),
  theme: {
    extend: {
      container: {
        center: true,
        padding: '1rem',
      },
      fontFamily: {
        'novecento': ['Novecento Regular', 'sans-serif'],
        'novecento-bold': ['Novecento Bold', 'sans-serif'],
        'novecento-light': ['Novecento Light', 'sans-serif'],
        'adelica-brush': ['Adelica Brush', 'sans-serif'],
        'lato': ['Lato Regular', 'sans-serif'],
      },
      colors: {
        primary: {
          100: "#ccd0e7",
          200: "#99a1d0",
          300: "#6672b8",
          400: "#3343a1",
          500: "#001489",
          600: "#00106e",
          700: "#000c52",
          800: "#000837",
          900: "#00041b"
        },
        secondary: {
          100: "#ccedf9",
          200: "#99dcf3",
          300: "#66caed",
          400: "#33b9e7",
          500: "#00a7e1",
          600: "#0086b4",
          700: "#006487",
          800: "#00435a",
          900: "#00212d"
        },
        yellow: {
          100: "#fff4d9",
          200: "#ffeab3",
          300: "#ffdf8d",
          400: "#ffd567",
          500: "#ffca41",
          600: "#cca234",
          700: "#997927",
          800: "#66511a",
          900: "#33280d"
        },
        black: {
          100: "#d3d2d2",
          200: "#a7a5a6",
          300: "#7b7979",
          400: "#4f4c4d",
          500: "#231f20",
          600: "#1c191a",
          700: "#151313",
          800: "#0e0c0d",
          900: "#000000"
        },
        gray: {
          100: "#e9e9e9",
          200: "#d3d3d3",
          300: "#bcbcbc",
          400: "#a6a6a6",
          500: "#909090",
          600: "#737373",
          700: "#565656",
          800: "#3a3a3a",
          900: "#1d1d1d"
        },
        "gray-bg": {
          100: "#fcfdfd",
          200: "#f8fbfb",
          300: "#f5f8fa",
          400: "#f1f6f8",
          500: "#eef4f6",
          600: "#bec3c5",
          700: "#8f9294",
          800: "#5f6262",
          900: "#303131"
        },
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

