import React from "react";

const Text = ({ children, style }) => {
  return <p style={{ ...style, margin: 0 }}>{children}</p>;
};

export default Text;
