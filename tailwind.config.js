/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin');

module.exports = {
  content: [
    "./classes/**/*.{php,html}",
    "./controllers/**/*.{php,html}",
    "./views/**/*.{php,html}",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    container: {
      center: true,
      // padding: {
      // 	'2xl': '1rem',
      // }
    },
    extend: {
      screens: {
        '2xl': '1408px',
        // => @media (min-width: 1600px) { ... }
        'maxlg': { 'max': '1023px' },
        // => @media (max-width: 1023px) { ... }
      },
      colors: {
        'azul': '#0C5ADB',
        'azul-claro': '#0090FF',
        'celeste': '#00C3FF',
        'negro': '#141414'
      },
      keyframes: {
        scrolldown: {
          '0%': {
            opacity: 0,
            height: '6px'
          },

          '40%': {
            opacity: 1,
            height: '10px'
          },

          '80%': {
            transform: 'translate(0, 20px)',
            height: '10px',
            opacity: 0
          },

          '100%': {
            height: '3px',
            opacity: 0
          },
        },
        pulse54: {
          'from': {
            opacity: 0
          },

          'to': {
            opacity: 0.5
          }
        },
        sombras: {

          '0%': {
            'box-shadow': '0 0 0 0 rgba(46, 229, 216, 0.35), 0 0 0 10px rgba(46, 229, 216, 0.35), 0 0 0 20px rgba(46, 229, 216, 0.35)'
          },
          '100%': { 'box-shadow': '0 0 0 10px rgba(46, 229, 216, 0.35), 0 0 0 20px rgba(46, 229, 216, 0.35), 0 0 0 30px rgba(255, 255, 255, 0)' },
        },
        typing: {
          'from': {
            width: 0
          },
        },
        blink: {
          '50%': {
            'border-color': 'transparent',
          },
        }
      },
      animation: {
        typing: 'typing 2s steps(17), blink .5s infinite step-end alternate',
        sombras: 'sombras 1s linear infinite',
        scrolldown: 'scrolldown 1.5s infinite',
        pulse54: 'pulse54 500ms ease infinite alternate'
      },
      backgroundImage: {
        'gradient-card': 'linear-gradient(45deg, #4f39fa, #da62c4 30%, hsl(17, 24%, 90%) 60%);',
        'homepage-hero-before': 'radial-gradient(100% 68% at 70% 15%,transparent 40%,white 79%),conic-gradient(from 90deg at 1px 1px,rgba(0,0,0,0) 90deg,rgba(202,212,215,.2) 0)',
        'homepage-hero-after': 'linear-gradient(203deg,#010b15 8.4%,#0C5ADB 30.67%,rgb(0 0 0 / 10%) 70.04%,rgba(255,255,255,0) 85%)',
        'why': "linear-gradient(20deg,rgba(0,0,0,.5),rgba(255,255,255,.3)),url('/build/img/Pattern-Randomized.svg')",
        'paginas-web': "linear-gradient(0deg,rgba(4,40,83,.85),rgba(13,29,121,.85)),url(/build/img/fondo-paginas-web.webp)",
        'features': "linear-gradient(0deg,rgba(33,68,105,.8),rgba(0,0,0,.8)),url('/build/img/fort.webp')"
      },
      boxShadow: {
        '3xl': 'rgb(16 254 254 / 32%) 0px 47px 165px, rgb(16 254 254 / 24%) 0px 30.463px 96.6319px, rgb(16 254 254 / 20%) 0px 18.1037px 52.5556px, rgb(16 254 254 / 16%) 0px 9.4px 26.8125px, rgb(16 254 254 / 13%) 0px 3.82963px 13.4444px, rgb(16 254 254 / 8%) 0px 0.87037px 6.49306px',
        card: '0 0.5em 1em -0.125em hsl(0deg 0% 4% / 10%), 0 0 0 1px hsl(0deg 0% 4% / 2%)'
      },
      transitionProperty: {
        'dropShadow': 'drop-shadow, filter',
      },
    },
    fontFamily: {
      open: ['"Open Sans"', ...defaultTheme.fontFamily.sans],
      sans: ['"Signika Negative"', ...defaultTheme.fontFamily.sans],
      // 'monospace': ['Inter var', 'monospace'],
    }
  },
  plugins: [
    plugin(function ({ addComponents }) {
      addComponents({
        '.btn': {
          backgroundColor: '#fff',
          borderColor: '#dbdbdb',
          borderWidth: '1px',
          color: '#363636',
          cursor: 'pointer',
          justifyContent: 'center',
          padding: 'calc(0.5em - 1px) 1em',
          textAlign: 'center',
          transition: 'color .2s ease-out,background-color .2s ease-out',
          whiteSpace: 'nowrap',
          alignItems: 'center',
          border: '1px solid transparent',
          borderRadius: '0.375em',
          boxShadow: 'none',
          display: 'inline-flex',
          fontSize: '1rem',
          height: '2.5em',
          justifyContent: 'flex-start',
          lineHeight: '1.5',
          position: 'relative',
          verticalAlign: 'top',
          '&:focus:not(:active)': {
            boxShadow: '0 0 0 0.125em rgba(0,144,255,.25)'
          }
        },
        '.btn-primary': {
          backgroundColor: '#0c5adb',
          borderColor: 'transparent',
          color: '#fff',
          '&:hover': {
            backgroundColor: '#0b55cf'
          },
          '&:active': {
            backgroundColor: '#0b50c3'
          },
          '&:focus:not(:active)': {
            boxShadow: '0 0 0 0.125em rgba(12,90,219,.25)'
          }
        },
        '.btn-danger': {
          backgroundColor: '#dc3545',
          borderColor: 'transparent',
          color: '#fff',
          '&:hover': {
            backgroundColor: '#bb2d3b'
          },
          '&:active': {
            backgroundColor: '#b02a37'
          },
          '&:focus:not(:active)': {
            boxShadow: '0 0 0 0.125em rgba(225,83,97,.25)'
          }
        }

      })
    }),
    plugin(function ({ addUtilities }) {
      addUtilities({
        '.line': {
          backgroundColor: '#0c5adb',
          borderRadius: '0.25rem',
          display: 'block',
          height: '0.355rem',
          marginTop: '1rem',
          width: '3.5rem'

        },

      })
    }),
    require('@tailwindcss/typography'),
    // ...
  ],
}

