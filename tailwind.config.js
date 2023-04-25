/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'mobile': '400px',
      'desktop': '1440px',

    },
    colors: {
      'green': '#0FBA68',
      'gray': '#808189',
      'yellow':'#EAD621',
      'blue':'#2029F3',
    },
    extend: {

      margin: {
        '108': '108px',
        '144': '144px'

      },
      fontSize: {
        '25': '25px'
      },
      width: {
        '343': ' 343px'
      },
      opacity:{
        '0.08':'0.08'
      },
    },
  },
  plugins: [],
}
