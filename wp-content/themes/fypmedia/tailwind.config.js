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
        'custom-red': '#E94565',
        'custom-blue2': '#55B5F0',
      }
    },
  },
  plugins: [],
}

