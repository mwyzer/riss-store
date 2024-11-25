import React from "react";

const Dropdown = ({ options, label, onChange }) => {
  return (
    <div>
      <label>{label}</label>
      <select onChange={(e) => onChange(e.target.value)} style={{ marginLeft: "10px", padding: "5px" }}>
        {options.map((option, index) => (
          <option key={index} value={option.value}>
            {option.label}
          </option>
        ))}
      </select>
    </div>
  );
};

export default Dropdown;
