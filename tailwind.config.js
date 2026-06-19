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
        navy: { DEFAULT: '#1a237e', 800: '#121858', 600: '#283593' },
        saffron: { DEFAULT: '#f57c00', light: '#ff9800', dark: '#ef6c00' },
        gold: { DEFAULT: '#D4A843', light: '#E8B96A', dark: '#A67828' },
        offwhite: '#F8F7F4',
      },
      fontFamily: {
        sans: ['Inter', 'Noto Sans Devanagari', 'sans-serif'],
        serif: ['Playfair Display', 'serif'],
      }
    },
  },
  plugins: [],
}
