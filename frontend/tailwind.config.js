/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,jsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: [
          '-apple-system',
          'BlinkMacSystemFont',
          '"Segoe UI"',
          'Roboto',
          '"Helvetica Neue"',
          'Arial',
          'sans-serif'
        ]
      },
      colors: {
        primary: '#0066CC',
        success: '#059669',
        error: '#DC2626'
      },
      spacing: {
        '4.5': '1.125rem',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
