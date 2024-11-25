import React from "react";

const LogButton = ({ label, onClick, variant }) => {
  const styles = {
    backgroundColor: variant === "primary" ? "#00c853" : "#d32f2f",
    color: "#fff",
    padding: "10px 15px",
    border: "none",
    borderRadius: "5px",
    cursor: "pointer",
  };

  return (
    <button style={styles} onClick={onClick}>
      {label}
    </button>
  );
};

export default LogButton;
