// resources/js/components/ui/select.jsx

import React, { useState } from "react";

export function Select({ children, defaultValue, className, ...props }) {
  const [open, setOpen] = useState(false);

  const handleToggle = () => {
    setOpen(!open);
  };

  return (
    <div
      className={`relative ${className}`}
      {...props}
    >
      <div
        className="cursor-pointer"
        onClick={handleToggle}
      >
        {children}
      </div>
      {open && <div className="absolute bg-[#25262b] border border-gray-800 rounded-lg mt-1 w-full z-10">{children}</div>}
    </div>
  );
}

export function SelectTrigger({ children, className, ...props }) {
  return (
    <div
      className={`py-2 px-4 bg-[#25262b] text-white border-none rounded-md cursor-pointer ${className}`}
      {...props}
    >
      {children}
    </div>
  );
}

export function SelectContent({ children, className, ...props }) {
  return (
    <div
      className={`max-h-60 overflow-auto bg-[#25262b] text-white rounded-lg shadow-lg ${className}`}
      {...props}
    >
      {children}
    </div>
  );
}

export function SelectItem({ value, children, className, ...props }) {
  return (
    <div
      className={`py-2 px-4 hover:bg-blue-500/20 cursor-pointer ${className}`}
      {...props}
    >
      {children}
    </div>
  );
}

export function SelectValue({ children, className, ...props }) {
  return (
    <span
      className={`text-sm text-white ${className}`}
      {...props}
    >
      {children}
    </span>
  );
}
