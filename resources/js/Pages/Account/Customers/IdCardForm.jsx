import React, { useState } from "react";

const CustomerRegistrationForm = () => {
  const [formFields, setFormFields] = useState({
    id_ktp: { value: "", status: "nonaktif" },
    full_name: { value: "", status: "nonaktif" },
    whatsapp_number: { value: "", status: "nonaktif" },
    job: { value: "", status: "nonaktif" },
    position: { value: "", status: "nonaktif" },
    work_location: { value: "", status: "nonaktif" },
    address: { value: "", status: "nonaktif" },
    customer_photo: { value: null, status: "nonaktif" },
    ktp_photo: { value: null, status: "nonaktif" },
    selfie_with_ktp: { value: null, status: "nonaktif" },
  });

  const handleInputChange = (field, value) => {
    setFormFields((prevState) => ({
      ...prevState,
      [field]: { ...prevState[field], value },
    }));
  };

  const handleStatusChange = (field, status) => {
    setFormFields((prevState) => ({
      ...prevState,
      [field]: { ...prevState[field], status },
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log("Form Data:", formFields);
    alert("Form submitted!");
  };

  return (
    <div className="container mx-auto p-4">
      <h1 className="text-center text-2xl font-bold mb-4">
        Form Pendaftaran Pelanggan KTP
      </h1>
      <form onSubmit={handleSubmit} className="bg-gray-800 p-4 rounded-md text-white">
        {Object.keys(formFields).map((field) => (
          <div key={field} className="mb-4">
            <label className="block text-sm font-bold mb-2 capitalize">
              {field.replace("_", " ")}
            </label>
            <div className="flex items-center space-x-4">
              {field.includes("photo") ? (
                <input
                  type="file"
                  onChange={(e) =>
                    handleInputChange(field, e.target.files[0])
                  }
                  className="block w-full px-3 py-2 text-gray-700 bg-gray-200 rounded"
                  disabled={formFields[field].status === "nonaktif"}
                />
              ) : (
                <input
                  type="text"
                  value={formFields[field].value}
                  onChange={(e) =>
                    handleInputChange(field, e.target.value)
                  }
                  className="block w-full px-3 py-2 text-gray-700 bg-gray-200 rounded"
                  placeholder={`Enter ${field}`}
                  disabled={formFields[field].status === "nonaktif"}
                />
              )}
              <div className="flex items-center space-x-2">
                <label>
                  <input
                    type="radio"
                    name={`${field}_status`}
                    value="nonaktif"
                    checked={formFields[field].status === "nonaktif"}
                    onChange={() => handleStatusChange(field, "nonaktif")}
                  />
                  Non-Aktif
                </label>
                <label>
                  <input
                    type="radio"
                    name={`${field}_status`}
                    value="opsional"
                    checked={formFields[field].status === "opsional"}
                    onChange={() => handleStatusChange(field, "opsional")}
                  />
                  Opsional
                </label>
                <label>
                  <input
                    type="radio"
                    name={`${field}_status`}
                    value="wajib"
                    checked={formFields[field].status === "wajib"}
                    onChange={() => handleStatusChange(field, "wajib")}
                  />
                  Wajib
                </label>
              </div>
            </div>
          </div>
        ))}
        <div className="flex justify-between mt-6">
          <button
            type="button"
            className="bg-red-500 text-white px-4 py-2 rounded"
          >
            Batalkan
          </button>
          <button
            type="submit"
            className="bg-green-500 text-white px-4 py-2 rounded"
          >
            Simpan
          </button>
        </div>
      </form>
    </div>
  );
};

export default CustomerRegistrationForm;
