import React, { useState } from "react";

const CustomerList = () => {
  // Sample data
  const customers = [
    {
      id: "640404161870003",
      name: "Andy Kuzon",
      type: "Pelanggan KTP",
      location: "JABRIEL",
      whatsapp: true,
      debt: "Rp 3.211.472",
      registered: 43,
    },
    {
      id: "640404160289005",
      name: "Jansen Udau",
      type: "Pelanggan KTP",
      location: "WESLYCAMP",
      whatsapp: true,
      debt: "Rp 1.211.472",
      registered: 15,
    },
    {
      id: "640404120199002",
      name: "Rehella Sambo",
      type: "Pelanggan Paspor",
      location: "GLORY",
      whatsapp: true,
      debt: "Rp 1.211.472",
      registered: 14,
    },
    {
      id: "640404120190018",
      name: "Kristoper Rohan",
      type: "Pelanggan Paspor",
      location: "SHAFF",
      whatsapp: true,
      debt: "Rp 1.211.472",
      registered: 12,
    },
    {
      id: "640404120190064",
      name: "Septi Rahyu",
      type: "Member Gold",
      location: "METSA",
      whatsapp: true,
      debt: "Rp 1.211.472",
      registered: 10,
    },
  ];

  const [filter, setFilter] = useState("Semua");

  // Filter customers based on the selected type
  const filteredCustomers =
    filter === "Semua"
      ? customers
      : customers.filter((customer) => customer.type.includes(filter));

  return (
    <div className="container mx-auto p-4">
      <h1 className="text-center text-2xl font-bold mb-4">Customer List</h1>
      <div className="flex justify-between items-center mb-4">
        <div>
          <button
            onClick={() => setFilter("Semua")}
            className={`px-4 py-2 rounded ${
              filter === "Semua" ? "bg-blue-500 text-white" : "bg-gray-200"
            }`}
          >
            Semua
          </button>
          <button
            onClick={() => setFilter("Pelanggan KTP")}
            className={`px-4 py-2 rounded mx-2 ${
              filter === "Pelanggan KTP"
                ? "bg-blue-500 text-white"
                : "bg-gray-200"
            }`}
          >
            Pelanggan KTP
          </button>
          <button
            onClick={() => setFilter("Pelanggan Paspor")}
            className={`px-4 py-2 rounded ${
              filter === "Pelanggan Paspor"
                ? "bg-blue-500 text-white"
                : "bg-gray-200"
            }`}
          >
            Pelanggan Paspor
          </button>
        </div>
        <div>
          <input
            type="text"
            placeholder="Search..."
            className="px-3 py-2 border rounded"
          />
        </div>
      </div>
      <table className="table-auto w-full text-left border-collapse border border-gray-300">
        <thead>
          <tr className="bg-gray-100">
            <th className="px-4 py-2 border">Nama & ID</th>
            <th className="px-4 py-2 border">Customer</th>
            <th className="px-4 py-2 border">WhatsApp</th>
            <th className="px-4 py-2 border">Lokasi</th>
            <th className="px-4 py-2 border">Hutang</th>
            <th className="px-4 py-2 border">Pelanggan di Daftar</th>
          </tr>
        </thead>
        <tbody>
          {filteredCustomers.map((customer) => (
            <tr key={customer.id} className="border-t">
              <td className="px-4 py-2 border">
                <div>
                  <p className="font-bold">{customer.name}</p>
                  <p className="text-sm text-gray-500">{customer.id}</p>
                </div>
              </td>
              <td className="px-4 py-2 border">{customer.type}</td>
              <td className="px-4 py-2 border">
                {customer.whatsapp ? "✅" : "❌"}
              </td>
              <td className="px-4 py-2 border">{customer.location}</td>
              <td className="px-4 py-2 border">{customer.debt}</td>
              <td className="px-4 py-2 border">{customer.registered}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default CustomerList;
