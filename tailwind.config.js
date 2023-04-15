/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        width:{
            "604": "604px",
            "343": "343px",
            "392": "392px",
        },
    },
  },
  plugins: [],
}

