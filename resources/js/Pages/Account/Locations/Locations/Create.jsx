import React, { useState } from "react";

const AddLocationForm = () => {
  // State for the form
  const [formData, setFormData] = useState({
    locationName: "",
    address: "",
    services: {
      dedicated: "Tidak ada",
      broadband: "Tidak ada",
      voucher: "Tersedia",
    },
    providers: [
      { type: "Pascabayar", provider: "Kartu Halo", number: "0815-2822-1221" },
      { type: "Prabayar", provider: "Kartu Byu", number: "0812-5654-8931" },
      { type: "Metro", provider: "Telkom", number: "TLK - SID 98872711" },
      { type: "Satelit", provider: "Star-TLKM", number: "SLK - KIT 16867432" },
    ],
    partners: {
      wilzioSeller: { status: true, max: 14 },
      wilzioPartner: { status: true, max: 1 },
    },
    installDate: "",
    mapUrl: "",
  });

  // Handle input change
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  return (
    <div className="bg-gray-900 text-white p-6 rounded-lg max-w-4xl mx-auto">
      <h1 className="text-xl font-bold mb-4">Tambah Lokasi Baru</h1>

      {/* Section: Identitas */}
      <div className="mb-6">
        <h2 className="text-lg font-semibold mb-2">Identitas</h2>
        <input
          type="text"
          name="locationName"
          placeholder="Nama Lokasi"
          value={formData.locationName}
          onChange={handleInputChange}
          className="w-full p-2 mb-4 rounded bg-gray-800"
        />
        <input
          type="text"
          name="address"
          placeholder="Alamat Lokasi"
          value={formData.address}
          onChange={handleInputChange}
          className="w-full p-2 rounded bg-gray-800"
        />
      </div>

      {/* Section: Jenis Layanan */}
      <div className="mb-6">
        <h2 className="text-lg font-semibold mb-2">Jenis Layanan</h2>
        {Object.keys(formData.services).map((service) => (
          <div key={service} className="mb-2">
            <label className="block capitalize">{service}</label>
            <select
              name={service}
              value={formData.services[service]}
              onChange={(e) =>
                setFormData({
                  ...formData,
                  services: { ...formData.services, [service]: e.target.value },
                })
              }
              className="w-full p-2 rounded bg-gray-800"
            >
              <option value="Tidak ada">Tidak ada</option>
              <option value="Tersedia">Tersedia</option>
            </select>
          </div>
        ))}
      </div>

      {/* Section: Provider */}
      <div className="mb-6">
        <h2 className="text-lg font-semibold mb-2">Provider</h2>
        {formData.providers.map((provider, index) => (
          <div key={index} className="mb-4">
            <div className="grid grid-cols-3 gap-4">
              <input
                type="text"
                value={provider.type}
                className="p-2 rounded bg-gray-800"
                disabled
              />
              <input
                type="text"
                value={provider.provider}
                className="p-2 rounded bg-gray-800"
                disabled
              />
              <input
                type="text"
                value={provider.number}
                className="p-2 rounded bg-gray-800"
                disabled
              />
            </div>
          </div>
        ))}
      </div>

      {/* Section: Mitra Lokasi */}
      <div className="mb-6">
        <h2 className="text-lg font-semibold mb-2">Mitra Lokasi</h2>
        {Object.keys(formData.partners).map((partner) => (
          <div key={partner} className="mb-4">
            <label className="block capitalize">{partner.replace(/([A-Z])/g, " $1")}</label>
            <div className="flex items-center space-x-4">
              <select
                value={formData.partners[partner].status ? "Aktif" : "Nonaktif"}
                onChange={(e) =>
                  setFormData({
                    ...formData,
                    partners: {
                      ...formData.partners,
                      [partner]: {
                        ...formData.partners[partner],
                        status: e.target.value === "Aktif",
                      },
                    },
                  })
                }
                className="p-2 rounded bg-gray-800"
              >
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
              </select>
              <input
                type="number"
                value={formData.partners[partner].max}
                onChange={(e) =>
                  setFormData({
                    ...formData,
                    partners: {
                      ...formData.partners,
                      [partner]: {
                        ...formData.partners[partner],
                        max: e.target.value,
                      },
                    },
                  })
                }
                className="w-16 p-2 rounded bg-gray-800"
              />
            </div>
          </div>
        ))}
      </div>

      {/* Section: Lainnya */}
      <div className="mb-6">
        <h2 className="text-lg font-semibold mb-2">Lainnya</h2>
        <input
          type="date"
          name="installDate"
          value={formData.installDate}
          onChange={handleInputChange}
          className="w-full p-2 mb-4 rounded bg-gray-800"
        />
        <div className="flex items-center">
          <input
            type="url"
            name="mapUrl"
            placeholder="Google Map URL"
            value={formData.mapUrl}
            onChange={handleInputChange}
            className="w-full p-2 rounded bg-gray-800"
          />
          <button className="ml-4 p-2 bg-blue-600 rounded">Lihat</button>
        </div>
      </div>

      {/* Actions */}
      <div className="flex justify-between">
        <button className="p-2 bg-red-600 rounded">Batalkan</button>
        <button className="p-2 bg-green-600 rounded">Simpan</button>
      </div>
    </div>
  );
};

export default AddLocationForm;
