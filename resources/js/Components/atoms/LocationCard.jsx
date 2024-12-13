import React from "react";
import { MapPin } from "lucide-react"; // Replace with your icon library or SVG

export function LocationCard({ location = "(Kosong)", details = "(Kosong)", dc = "DC", vc = "VC", bd = "BD" }) {
  return (
    <div className="flex items-center justify-between bg-blue-800 text-white rounded-md p-3 shadow-md w-[180px]">
      {/* Left Section */}
      <div className="flex items-center gap-2">
        <div className="flex flex-col items-center justify-center">
          <span className="text-sm font-bold">{dc}</span>
        </div>

        {/* Icon and Text */}
        <div className="flex flex-col items-start">
          <MapPin className="w-4 h-4 text-red-500" />
          <span className="text-xs">{location}</span>
          <span className="text-xs">{details}</span>
        </div>
      </div>

      {/* Right Section */}
      <div className="flex flex-col items-center gap-1 text-xs font-bold">
        <span>{vc}</span>
        <span>{bd}</span>
      </div>
    </div>
  );
}

