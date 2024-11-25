import React from "react";
import Text from "../atoms/Text";
import Card from "../atoms/Card";

const DataSummary = ({ data }) => {
  return (
    <Card>
      {Object.entries(data).map(([key, value]) => (
        <Text key={key} style={{ fontWeight: "bold" }}>
          {key}: <span style={{ color: "#00e676" }}>{value}</span>
        </Text>
      ))}
    </Card>
  );
};

export default DataSummary;
