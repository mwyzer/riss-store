import React from "react";
import Dropdown from "../atoms/Dropdown";
import Button from "../atoms/LogButton";

const FilterControls = ({ filters, onApply, onReset }) => {
  return (
    <div style={{ display: "flex", gap: "15px", alignItems: "center", marginBottom: "15px" }}>
      {filters.map((filter, index) => (
        <Dropdown
          key={index}
          label={filter.label}
          options={filter.options}
          onChange={(value) => console.log(`${filter.label} selected:`, value)}
        />
      ))}
      <Button label="Apply" variant="primary" onClick={onApply} />
      <Button label="Reset" variant="secondary" onClick={onReset} />
    </div>
  );
};

export default FilterControls;
