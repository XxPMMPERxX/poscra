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
      'sans': ['ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Roboto', "Helvetica Neue", "Arial", "Noto Sans", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"],
      'cpfont': ['CP font'],
      'yusei': ['yusei magic'],
    },
    extend: {},
  },
  plugins: [require("daisyui")],
}

