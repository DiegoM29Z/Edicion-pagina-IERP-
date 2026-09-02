/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './*.php',
    './template-parts/**/*.php',
    './patterns/**/*.php',
    './inc/**/*.php',
    './src/js/**/*.{js,jsx}',
    './src/blocks/**/*.{js,jsx}',
    './src/blocks/**/*.php',
    './src/css/**/*.css'
  ],
  theme: {
    extend: {
      colors: {
        'gov-top': "#0943B5",

        // Nueva paleta personalizable con variables CSS y variantes
        'brand': {
          // Color primario con variantes
          'primary': {
            DEFAULT: 'hsl(var(--color-brand-primary) / <alpha-value>)',
            50: 'hsl(var(--color-brand-primary-50) / <alpha-value>)',
            100: 'hsl(var(--color-brand-primary-100) / <alpha-value>)',
            200: 'hsl(var(--color-brand-primary-200) / <alpha-value>)',
            300: 'hsl(var(--color-brand-primary-300) / <alpha-value>)',
            400: 'hsl(var(--color-brand-primary-400) / <alpha-value>)',
            500: 'hsl(var(--color-brand-primary) / <alpha-value>)',
            600: 'hsl(var(--color-brand-primary-600) / <alpha-value>)',
            700: 'hsl(var(--color-brand-primary-700) / <alpha-value>)',
            800: 'hsl(var(--color-brand-primary-800) / <alpha-value>)',
            900: 'hsl(var(--color-brand-primary-900) / <alpha-value>)',
          },
          // Color secundario con variantes
          'secondary': {
            DEFAULT: 'hsl(var(--color-brand-secondary) / <alpha-value>)',
            50: 'hsl(var(--color-brand-secondary-50) / <alpha-value>)',
            100: 'hsl(var(--color-brand-secondary-100) / <alpha-value>)',
            200: 'hsl(var(--color-brand-secondary-200) / <alpha-value>)',
            300: 'hsl(var(--color-brand-secondary-300) / <alpha-value>)',
            400: 'hsl(var(--color-brand-secondary-400) / <alpha-value>)',
            500: 'hsl(var(--color-brand-secondary) / <alpha-value>)', // Default
            600: 'hsl(var(--color-brand-secondary-600) / <alpha-value>)',
            700: 'hsl(var(--color-brand-secondary-700) / <alpha-value>)',
            800: 'hsl(var(--color-brand-secondary-800) / <alpha-value>)',
            900: 'hsl(var(--color-brand-secondary-900) / <alpha-value>)',
          },
          // Color acento con variantes
          'accent': {
            DEFAULT: 'hsl(var(--color-brand-accent) / <alpha-value>)',
            50: 'hsl(var(--color-brand-accent-50) / <alpha-value>)',
            100: 'hsl(var(--color-brand-accent-100) / <alpha-value>)',
            200: 'hsl(var(--color-brand-accent-200) / <alpha-value>)',
            300: 'hsl(var(--color-brand-accent-300) / <alpha-value>)',
            400: 'hsl(var(--color-brand-accent-400) / <alpha-value>)',
            500: 'hsl(var(--color-brand-accent) / <alpha-value>)', // Default
            600: 'hsl(var(--color-brand-accent-600) / <alpha-value>)',
            700: 'hsl(var(--color-brand-accent-700) / <alpha-value>)',
            800: 'hsl(var(--color-brand-accent-800) / <alpha-value>)',
            900: 'hsl(var(--color-brand-accent-900) / <alpha-value>)',
          },
          // Color advertencia con variantes
          'warning': {
            DEFAULT: 'hsl(var(--color-brand-warning) / <alpha-value>)',
            50: 'hsl(var(--color-brand-warning-50) / <alpha-value>)',
            100: 'hsl(var(--color-brand-warning-100) / <alpha-value>)',
            200: 'hsl(var(--color-brand-warning-200) / <alpha-value>)',
            300: 'hsl(var(--color-brand-warning-300) / <alpha-value>)',
            400: 'hsl(var(--color-brand-warning-400) / <alpha-value>)',
            500: 'hsl(var(--color-brand-warning) / <alpha-value>)', // Default
            600: 'hsl(var(--color-brand-warning-600) / <alpha-value>)',
            700: 'hsl(var(--color-brand-warning-700) / <alpha-value>)',
            800: 'hsl(var(--color-brand-warning-800) / <alpha-value>)',
            900: 'hsl(var(--color-brand-warning-900) / <alpha-value>)',
          },
          // Color peligro con variantes
          'danger': {
            DEFAULT: 'hsl(var(--color-brand-danger) / <alpha-value>)',
            50: 'hsl(var(--color-brand-danger-50) / <alpha-value>)',
            100: 'hsl(var(--color-brand-danger-100) / <alpha-value>)',
            200: 'hsl(var(--color-brand-danger-200) / <alpha-value>)',
            300: 'hsl(var(--color-brand-danger-300) / <alpha-value>)',
            400: 'hsl(var(--color-brand-danger-400) / <alpha-value>)',
            500: 'hsl(var(--color-brand-danger) / <alpha-value>)', // Default
            600: 'hsl(var(--color-brand-danger-600) / <alpha-value>)',
            700: 'hsl(var(--color-brand-danger-700) / <alpha-value>)',
            800: 'hsl(var(--color-brand-danger-800) / <alpha-value>)',
            900: 'hsl(var(--color-brand-danger-900) / <alpha-value>)',
          },
        },

        // Colores antiguos mantenidos para compatibilidad
        'primary': '#3366CC',
        'background-light': '#FFFFFF',
        'background-dark': '#1A202C',
        'text-light': '#1A202C',
        'text-dark': '#EDF2F7',
        'border-light': '#E2E8F0',
        'border-dark': '#4A5568',
        'accent': '#FFA500',

        'keppel': {
          50: 'hsl(var(--keppel-50) / <alpha-value>)',
          100: 'hsl(var(--keppel-100) / <alpha-value>)',
          200: 'hsl(var(--keppel-200) / <alpha-value>)',
          300: 'hsl(var(--keppel-300) / <alpha-value>)',
          400: 'hsl(var(--keppel-400) / <alpha-value>)',
          500: 'hsl(var(--keppel-500) / <alpha-value>)',
          600: 'hsl(var(--keppel-600) / <alpha-value>)',
          700: 'hsl(var(--keppel-700) / <alpha-value>)',
          800: 'hsl(var(--keppel-800) / <alpha-value>)',
          900: 'hsl(var(--keppel-900) / <alpha-value>)',
          950: 'hsl(var(--keppel-950) / <alpha-value>)',
        }
      },

      fontFamily: {
        'sans': ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Oxygen-Sans', 'Ubuntu', 'Cantarell', 'Helvetica Neue', 'sans-serif'],
        'code': ['Monaco', 'Consolas', 'Andale Mono', 'DejaVu Sans Mono', 'monospace'],
        'quartzo-bold': ['Quartzo-Bold', 'sans-serif'],
        'plus-jakarta': ['Plus Jakarta Sans', 'sans-serif'],
        'display': ['Montserrat', 'sans-serif'],
      },

      spacing: {
        '15': '3.75rem',
        '18': '4.5rem',
        '88': '22rem',
        '92': '23rem',
      },

      screens: {
        'xs': '480px',
      },

      aspectRatio: {
        '4/3': '4 / 3',
        '3/2': '3 / 2',
        '2/3': '2 / 3',
        '9/16': '9 / 16',
      },

      maxWidth: {
        'content': '1200px',
        'content-wide': '1400px',
      },
      gridTemplateColumns: {
        '1': 'repeat(1, minmax(0, 1fr))',
        '2': 'repeat(2, minmax(0, 1fr))',
        '3': 'repeat(3, minmax(0, 1fr))',
        '4': 'repeat(4, minmax(0, 1fr))',
      },
      borderRadius: {
        DEFAULT: '0.5rem',
      }
    },
  },
  plugins: [
    // require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    function ({ addComponents, theme }) {
      addComponents({
        // TODO
      })
    }
  ],
  corePlugins: {
    preflight: true,
  },
}