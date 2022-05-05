module.exports = {
  content: [
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      './src/**/*.{html,js}', './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Inter', 'sans-serif'],
        },
        colors: {
            // Configure your color palette here
            'bordeaux':'#C84C44',
        },
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('tw-elements/dist/plugin')
  ],
}
