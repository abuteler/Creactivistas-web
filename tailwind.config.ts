import type { Config } from 'tailwindcss'

const config: Config = {
  content: [
    './src/pages/**/*.{js,ts,jsx,tsx,mdx}',
    './src/components/**/*.{js,ts,jsx,tsx,mdx}',
    './src/app/**/*.{js,ts,jsx,tsx,mdx}',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        'gradient-conic':
          'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
      },
      colors: {
        'creactivistas-blue': 'rgb(var(--creactivistas-primary-blue))',
        'creactivistas-blue-light': 'rgb(var(--creactivistas-primary-blue-light))',
        'creactivistas-green': 'rgb(var(--creactivistas-primary-green))',
        'creactivistas-green-light2': 'rgb(var(--creactivistas-primary-green-light2))',
        'creactivistas-green-light4': 'rgb(var(--creactivistas-primary-green-light4))',
      },
      minWidth: {
        '9s': '425px',
      },
    },
  },
  plugins: [],
}
export default config
