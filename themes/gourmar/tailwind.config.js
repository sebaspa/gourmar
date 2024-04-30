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
      }
    },
  },
  plugins: [],
}

