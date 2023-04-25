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
      'lightGr':'#F6F6F7',
      'greenO': 'rgba(15, 186, 104, 0.08);',
      'gray': '#808189',
      'yellowO':'rgba(234, 214, 33, 0.08)',
      'blueO':'rgba(32, 41, 243, 0.08)',
      'green':"#0FBA68",

      'blue':"#2029F3",
      'yellow':' #EAD621'

      
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
