import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "-sm": {max: "639px"},
            "-md": {max: "767px"},
            "-lg": {max: "1023px"},
            "-xl": {max: "1279px"},
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "2rem",
                sm: "2.5rem",
                md: "1rem",
            },
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                darkblue: {
                    DEFAULT: "#202945",
                    50: "#6579B8",
                    100: "#576DB1",
                    200: "#475B99",
                    300: "#3A4A7D",
                    400: "#34426F",
                    500: "#2D3A62",
                    600: "#273254",
                    700: "#202946",
                    800: "#1A2138",
                    900: "#13192A",
                },
                dusk: {
                    DEFAULT: "#4A4F54",
                    50: "#A5ABB0",
                    100: "#9BA1A7",
                    200: "#858C93",
                    300: "#70787F",
                    400: "#5D636A",
                    500: "#4A4F54",
                    600: "#373B3E",
                    700: "#303336",
                    800: "#26292B",
                    900: "#1F2123",
                },
                tender: {
                    DEFAULT: "#6E8498",
                    50: "#F4F5F7",
                    100: "#CDD5DC",
                    200: "#D7DCE0",
                    300: "#9EACBA",
                    400: "#8698A9",
                    500: "#6E8498",
                    600: "#566878",
                    700: "#42505C",
                    800: "#2A333C",
                    900: "#20272D",
                },
                dawn: {
                    DEFAULT: "#BAC2BA",
                    50: "#FFFFFF",
                    100: "#FAFAFA",
                    200: "#F4F5F4",
                    300: "#EFF1EF",
                    400: "#E9ECE9",
                    500: "#DADEDA",
                    600: "#BCC4BC",
                    700: "#9FA99F",
                    800: "#818F81",
                    900: "#667266",
                },
                mustard: {
                    DEFAULT: "#CDAD7D",
                    50: "#FBF9F5",
                    100: "#FAF7F3",
                    200: "#EFE5D5",
                    300: "#E4D2B8",
                    400: "#D8C09A",
                    500: "#CDAD7D",
                    600: "#BD9354",
                    700: "#9D773C",
                    800: "#75582D",
                    900: "#4C391D",
                },
            },
        },
    },

    plugins: [forms],
};
