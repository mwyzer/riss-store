import React from "react";

const MainTemplate = ({ children }) => {
  return (
    <div style={{ padding: "20px", backgroundColor: "#001e3c", color: "#fff" }}>
      <h1 style={{ color: "#00e676" }}>Chart Harian</h1>
      {children}
    </div>
  );
};

export default MainTemplate;
