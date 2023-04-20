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
    colors:{
      'green':'#0FBA68',
      'gray':'#808189',
    },
    extend: {

      margin:{
        '108':'108px',
        
      },

      width:{
        '343':' 343px'
      },
    },
  },
  plugins: [],
}
