// resources/js/components/ui/avatar.jsx

import React from "react";

export function Avatar({ children, className, ...props }) {
  return (
    <div
      className={`inline-flex items-center justify-center overflow-hidden rounded-full ${className}`}
      {...props}
    >
      {children}
    </div>
  );
}

export function AvatarImage({ src, alt, className, ...props }) {
  return (
    <img
      src={src}
      alt={alt}
      className={`w-full h-full object-cover ${className}`}
      {...props}
    />
  );
}

export function AvatarFallback({ children, className, ...props }) {
  return (
    <span
      className={`w-full h-full flex items-center justify-center bg-gray-500 text-white text-xs ${className}`}
      {...props}
    >
      {children}
    </span>
  );
}
