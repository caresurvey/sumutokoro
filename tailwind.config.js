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
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    /*
    extend: {
      colors: {
        base: '#f0f0f0',
        base_dark: '#ebebeb',
        side_color: '#313131',
        side_border: '#444',
        accent: '#00891c',
        accent_light: '#17a93b',
        accent_dark: '#005b06',
        brown: '#4d3c31',
      },
    },
    */
  },
  plugins: [
      //require('flowbite/plugin'),
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
