import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                "slow-pulse": {
                    "0%, 100%": { opacity: "0.6", transform: "translateY(0)" },
                    "50%": { opacity: "1", transform: "translateY(-6px)" },
                },
                "fade-in-up": {
                    "0%": { opacity: "0", transform: "translateY(12px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                // Improved Glow: Animates opacity/scale instead of expensive box-shadow
                "soft-glow": {
                    "0%, 100%": { opacity: "0.3", transform: "scale(1)" },
                    "50%": { opacity: "0.5", transform: "scale(1.05)" },
                },
                // For that smooth background texture movement
                "subtle-drift": {
                    "0%": { backgroundPosition: "0% 0%" },
                    "100%": { backgroundPosition: "40px 40px" },
                },
            },
            animation: {
                "slow-pulse": "slow-pulse 4s ease-in-out infinite",
                "fade-in-up": "fade-in-up 700ms ease-out both",
                "soft-glow": "soft-glow 8s ease-in-out infinite",
                "subtle-drift": "subtle-drift 10s linear infinite",
            },
        },
    },

    plugins: [forms],
};