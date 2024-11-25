import React from "react";

const Header = () => {
  const headerStyle = {
    backgroundColor: "#0d47a1",
    color: "#fff",
    padding: "15px 20px",
    textAlign: "center",
    borderBottom: "2px solid #00e676",
    fontSize: "24px",
    fontWeight: "bold",
  };

  return (
    <header style={headerStyle}>
      Chart Harian
    </header>
  );
};

export default Header;
