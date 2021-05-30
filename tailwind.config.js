module.exports = {
  purge: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        fontFamily: {
            'sans': ['Montserrat', 'system-ui'],
            'serif': ['Montserrat', 'Georgia'],
            'mono': ['ui-monospace', 'SFMono-Regular'],
            'display': ['Oswald'],
            'body': ['Open Sans'],
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
