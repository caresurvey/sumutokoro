const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./packages/Tool/Admin/resources/views/**/*.blade.php",
    "./packages/Tool/Common/resources/views/**/*.blade.php",
    "./packages/Tool/General/resources/views/**/*.blade.php",
    "./packages/Tool/User/resources/views/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.css",
  ],
  theme: {
  },
  plugins: [
      require('daisyui')
  ],
  daisyui: {
    themes: [
      {
        sumutokoro: {
          "primary": "#00891C",
          "secondary": "#91BD9F",
          "accent": "#00891C",
          "neutral": "#00891c",
          "base-100": "#F1F0F0",
          "info": "#91BD9F",
          "success": "#00891C",
          "warning": "#FBBD23",
          "error": "#CC0000",
          "dark": "#2F302F",
        },
      },
    ],
  },
}
