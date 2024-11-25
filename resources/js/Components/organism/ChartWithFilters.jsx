import React, { useState } from "react";
import FilterControls from "../molecules/FilterControls";
import DataSummary from "../molecules/DataSummary";
import { Line } from "react-chartjs-2";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Filler,
  Legend,
} from "chart.js";

// Register Chart.js components
ChartJS.register(CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Filler, Legend);

const ChartWithFilters = () => {
  // Chart data
  const chartData = {
    labels: ["1", "2", "3", "4", "5", "6", "7"], // X-axis labels
    datasets: [
      {
        label: "Voucher",
        data: [400, 700, 300, 500, 800, 600, 900], // Data for "Voucher"
        borderColor: "#8884d8",
        backgroundColor: "rgba(136, 132, 216, 0.2)",
        fill: true,
        tension: 0.4, // Smooth line
      },
      {
        label: "Broadband",
        data: [300, 600, 400, 700, 900, 700, 800], // Data for "Broadband"
        borderColor: "#82ca9d",
        backgroundColor: "rgba(130, 202, 157, 0.2)",
        fill: true,
        tension: 0.4,
      },
      {
        label: "Dedicated",
        data: [200, 500, 300, 600, 700, 500, 600], // Data for "Dedicated"
        borderColor: "#ff7300",
        backgroundColor: "rgba(255, 115, 0, 0.2)",
        fill: true,
        tension: 0.4,
      },
    ],
  };

  // Chart options
  const chartOptions = {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
      title: {
        display: true,
        text: `STATISTIC REVENUE - ${new Date().getFullYear()}`,
      },
    },
  };

  // Data summary for display
  const summary = {
    Voucher: "Rp 13.324.245",
    Broadband: "Rp 13.324.245",
    Dedicated: "Rp 13.324.245",
    "Total Income": "Rp 13.324.245",
    Tagihan: "Rp 1654.00",
  };

  // Filter options
  const filters = [
    { label: "Chart", options: [{ label: "Semua", value: "all" }, { label: "Voucher", value: "voucher" }] },
    { label: "Lokasi Wifi", options: [{ label: "Semua", value: "all" }, { label: "Jakarta", value: "jakarta" }] },
    { label: "Customer", options: [{ label: "Semua", value: "all" }, { label: "VIP", value: "vip" }] },
    { label: "Periode", options: [{ label: "Sept 2023", value: "sept" }, { label: "Oct 2023", value: "oct" }] },
  ];

  // Filter handlers
  const handleApply = () => {
    console.log("Filters applied");
  };

  const handleReset = () => {
    console.log("Filters reset");
  };

  return (
    <div>
      {/* Data summary display */}
      <DataSummary data={summary} />

      {/* Filter controls */}
      <FilterControls filters={filters} onApply={handleApply} onReset={handleReset} />

      {/* Chart.js Line Chart */}
      <div style={{ marginTop: "20px" }}>
        <Line data={chartData} options={chartOptions} />
      </div>
    </div>
  );
};

export default ChartWithFilters;
