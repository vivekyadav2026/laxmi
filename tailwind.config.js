/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        navy: { DEFAULT: '#0B1F3A', 800: '#071527', 600: '#142E54', light: '#18345E' },
        saffron: { DEFAULT: '#f57c00', light: '#ff9800', dark: '#ef6c00' },
        gold: { DEFAULT: '#D4A843', light: '#E8B96A', dark: '#A67828' },
        offwhite: '#F4F6F9',
      },
      fontFamily: {
        sans: ['Inter', 'Noto Sans Devanagari', 'sans-serif'],
        serif: ['Playfair Display', 'serif'],
      }
    },
  },
  plugins: [],
}
