/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#06e0b1",
                    secondary: "#b220db",
                    accent: "#ea98a7",
                    neutral: "#171927",
                    "base-100": "#fafafa",
                    info: "#77b0df",
                    success: "#15564f",
                    warning: "#face66",
                    error: "#eb5e56",
                },
            },
        ],
    },
};
