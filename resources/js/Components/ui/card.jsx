// resources/js/components/ui/card.jsx

import React from "react";

export function Card({ children, className, header, footer, ...props }) {
  return (
    <div
      className={`bg-[#25262b] border border-gray-800 rounded-lg p-4 shadow-lg ${className}`}
      {...props}
    >
      {header && <div className="text-xl font-semibold text-white mb-2">{header}</div>}
      <div className="text-white">{children}</div>
      {footer && <div className="mt-2 text-sm text-gray-400">{footer}</div>}
    </div>
  );
}
