/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    colors: {
      'myaccent': '#f3c259',
      'mydark': '#1F2933',
      'mywhite': '#F5F5F5',
    },
    fontFamily: {
      'cpfont': ['CP font'],
      'yusei': ['yusei magic'],
    },
    extend: {},
  },
  plugins: [require("daisyui")],
}

