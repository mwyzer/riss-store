import React from "react";

const FormPendaftaranPelanggan = () => {
  return (
    <div style={{ backgroundColor: "#121212", color: "#fff", padding: "20px", minHeight: "100vh" }}>
      <div style={{ textAlign: "center", marginBottom: "20px" }}>
        <div style={{ backgroundColor: "#1f6fd2", padding: "10px", borderRadius: "8px", display: "inline-block" }}>
          <img
            src="/passport-icon.png" // Replace with the actual image source
            alt="Paspor"
            style={{ width: "50px", height: "50px", marginBottom: "10px" }}
          />
          <h2>Form Pendaftaran Pelanggan</h2>
          <h3>PASPOR</h3>
        </div>
      </div>

      <div style={{ display: "flex", justifyContent: "center", gap: "10px", marginBottom: "20px" }}>
        <button className="filter-button">Pilih Semua</button>
        <label>
          <input type="radio" name="status" value="Non-Aktif" /> Non-Aktif
        </label>
        <label>
          <input type="radio" name="status" value="Opsional" /> Opsional
        </label>
        <label>
          <input type="radio" name="status" value="Wajib" /> Wajib
        </label>
        <label>
          <input type="radio" name="status" value="Beragam" /> Beragam
        </label>
      </div>

      <div style={{ display: "flex", flexWrap: "wrap", gap: "20px", justifyContent: "center" }}>
        {[
          "ID / Nomor Paspor",
          "Nama Lengkap",
          "Nomor WhatsApp",
          "Pekerjaan",
          "Jabatan",
          "Lokasi Kerja",
          "Alamat",
          "Foto Pelanggan",
          "Foto KTP",
          "Foto Selfie With KTP",
        ].map((field) => (
          <div
            key={field}
            style={{
              backgroundColor: "#1f6fd2",
              padding: "10px",
              borderRadius: "8px",
              width: "250px",
              textAlign: "center",
            }}
          >
            <h4>{field}</h4>
            <div>
              <label>
                <input type="radio" name={field} value="Non-Aktif" /> Non-Aktif
              </label>
              <label>
                <input type="radio" name={field} value="Opsional" /> Opsional
              </label>
              <label>
                <input type="radio" name={field} value="Wajib" /> Wajib
              </label>
            </div>
          </div>
        ))}
      </div>

      <div style={{ display: "flex", justifyContent: "center", marginTop: "20px", gap: "10px" }}>
        <button style={{ backgroundColor: "#1f6fd2", padding: "10px 20px", borderRadius: "8px", color: "#fff" }}>
          Batalkan
        </button>
        <button style={{ backgroundColor: "#28a745", padding: "10px 20px", borderRadius: "8px", color: "#fff" }}>
          Simpan
        </button>
      </div>
    </div>
  );
};

export default FormPendaftaranPelanggan;
