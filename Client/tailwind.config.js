/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      animation:{
        'bounce-slow': 'bounce 2s linear infinite',
      },
      keyframes: {
        wiggle: {
          '0%, 180%': { transform: 'rotate(-3deg)' },
          '100%': { transform: 'rotate(3deg)' },
        }
      }
    },
  },
  plugins: [],
}

