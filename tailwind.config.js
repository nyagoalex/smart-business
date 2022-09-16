const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    media: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                primary: colors.indigo,
                secondary: colors.cyan,
                gray: colors.slate,
            },
            fontFamily: {
                display: ['Barlow', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'blunt-lg': '-12px 12px #E7EDF7',
                blunt: '-8px 8px #E7EDF7',
                'blunt-sm': '-6px 6px #E7EDF7',
                'blunt-xs': '-4px 4px #E7EDF7',
            },
            fontSize: {
                xxs: ['.6rem', '.7rem'],
            },
        },
        container: {
            center: true,
            padding: '2em',
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
    ],
}
