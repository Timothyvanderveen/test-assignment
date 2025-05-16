/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./assets/**/*.js",
        "./templates/**/*.html.twig",
    ],
    theme: {
        extend: {
            fontFamily: {
                primary: ['Urbanist', 'sans-serif'],
            },
            colors: {
                primary: '#111827',
                secondary: '#6d7280',
                border: '#e5e7eb',
                link: '#3b82f6',
            }
        }
    },
    plugins: [],
}
