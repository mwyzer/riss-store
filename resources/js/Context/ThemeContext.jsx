import React, { createContext, useContext, useEffect, useState } from "react";

const ThemeContext = createContext();

// ThemeProvider to wrap the application
export const ThemeProvider = ({ children }) => {
    const [isDarkMode, setIsDarkMode] = useState(() => {
        // Check localStorage for the theme preference
        return localStorage.getItem("theme") === "dark";
    });

    // Toggle theme
    const toggleTheme = () => {
        setIsDarkMode((prevMode) => !prevMode);
    };

    // Apply theme to the body and save it to localStorage
    useEffect(() => {
        if (isDarkMode) {
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("theme", "light");
        }
    }, [isDarkMode]);

    return (
        <ThemeContext.Provider value={{ isDarkMode, toggleTheme }}>
            {children}
        </ThemeContext.Provider>
    );
};

// Custom hook to use theme context
export const useTheme = () => useContext(ThemeContext);
