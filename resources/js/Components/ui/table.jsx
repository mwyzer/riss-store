// resources/js/components/ui/table.jsx

import React from "react";

export function Table({ children, className, ...props }) {
  return (
    <table className={`min-w-full bg-[#25262b] text-white ${className}`} {...props}>
      {children}
    </table>
  );
}

export function TableHeader({ children, className, ...props }) {
  return (
    <thead className={`bg-[#25262b] ${className}`} {...props}>
      {children}
    </thead>
  );
}

export function TableBody({ children, className, ...props }) {
  return (
    <tbody className={className} {...props}>
      {children}
    </tbody>
  );
}

export function TableRow({ children, className, ...props }) {
  return (
    <tr className={`hover:bg-[#2c2d32] border-gray-800 ${className}`} {...props}>
      {children}
    </tr>
  );
}

export function TableHead({ children, className, ...props }) {
  return (
    <th
      className={`text-sm text-left px-4 py-2 font-semibold text-gray-400 ${className}`}
      {...props}
    >
      {children}
    </th>
  );
}

export function TableCell({ children, className, ...props }) {
  return (
    <td className={`px-4 py-2 text-sm ${className}`} {...props}>
      {children}
    </td>
  );
}
