// resources/js/components/ui/input.jsx

import React from "react";

export function Input({ className, ...props }) {
  return (
    <input
      {...props}
      className={`px-4 py-2 rounded-md bg-[#25262b] text-white placeholder-gray-500 border-none focus:outline-none focus:ring-2 focus:ring-blue-400 ${className}`}
    />
  );
}
