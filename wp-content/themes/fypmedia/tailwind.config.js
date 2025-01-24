/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php"],
  theme: {
    extend: {
      colors: {
        'custom-black': '#100F16',
        'custom-blue': '#6A00F4',
        'custom-purple': '#D700FF',
      }
    },
  },
  plugins: [],
}

