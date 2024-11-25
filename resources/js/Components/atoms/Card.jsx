import React from "react";

const Card = ({ children }) => {
  const styles = {
    backgroundColor: "#0d47a1",
    padding: "15px",
    borderRadius: "10px",
    color: "#fff",
    marginBottom: "10px",
  };

  return <div style={styles}>{children}</div>;
};

export default Card;
