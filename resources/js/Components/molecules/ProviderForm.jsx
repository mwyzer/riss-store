import React, { useState } from 'react'
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"
import { Card, CardContent } from "@/components/ui/card"

function ProviderForm() {
  const [loadBalance, setLoadBalance] = useState("Iya")
  const [ispCount, setIspCount] = useState("4 ISP")

  const providers = [
    {
      id: "ISP-01",
      provider: "Pascabayar",
      providerOptions: ["Pascabayar", "Prabayar", "Metro", "Satelit"],
      type: "Kartu Halo",
      typeOptions: ["Kartu Halo", "Kartu As", "Kartu Simpati", "Kartu Loop"],
      number: "0815-2822-1221",
      numberOptions: ["0815-2822-1221", "0812-3456-7890", "0857-9876-5432", "0878-1234-5678"]
    },
    {
      id: "ISP-02",
      provider: "Prabayar",
      providerOptions: ["Prabayar", "Pascabayar", "Metro", "Satelit"],
      type: "Kartu Byu",
      typeOptions: ["Kartu Byu", "Kartu IM3", "Kartu Mentari", "Kartu XL"],
      number: "0812-5654-8931",
      numberOptions: ["0812-5654-8931", "0856-7890-1234", "0877-5432-1098", "0898-7654-3210"]
    },
    {
      id: "ISP-03",
      provider: "Metro",
      providerOptions: ["Metro", "Pascabayar", "Prabayar", "Satelit"],
      type: "Telkom",
      typeOptions: ["Telkom", "Indosat", "XL", "Smartfren"],
      number: "TLK - SID 98827211",
      numberOptions: ["TLK - SID 98827211", "IND - SID 87654321", "XL - SID 12345678", "SMF - SID 56789012"]
    },
    {
      id: "ISP-04",
      provider: "Satelit",
      providerOptions: ["Satelit", "Pascabayar", "Prabayar", "Metro"],
      type: "Star-TLKM",
      typeOptions: ["Star-TLKM", "Garuda-SAT", "Nusantara-SAT", "Indo-SAT"],
      number: "SLK - KIT 158674432",
      numberOptions: ["SLK - KIT 158674432", "GRD - KIT 987654321", "NST - KIT 246813579", "IND - KIT 135792468"]
    }
  ]

  return (
    <div className="min-h-screen bg-black p-4">
      <Card className="max-w-md mx-auto bg-zinc-900 border-zinc-800">
        <CardContent className="space-y-4 p-4">
          <div className="space-y-4">
            <div>
              <label className="text-sm text-zinc-400 mb-2 block">
                Sistem Load Balance?
              </label>
              <Select defaultValue={loadBalance} onValueChange={setLoadBalance}>
                <SelectTrigger className="w-full bg-blue-600 text-white border-none">
                  <SelectValue placeholder="Pilih sistem" />
                </SelectTrigger>
                <SelectContent className="bg-zinc-800 border-zinc-700">
                  <SelectItem value="Iya" className="text-white">Iya</SelectItem>
                  <SelectItem value="Tidak" className="text-white">Tidak</SelectItem>
                </SelectContent>
              </Select>
            </div>

            <div>
              <label className="text-sm text-zinc-400 mb-2 block">
                Jumlah Provider
              </label>
              <Select defaultValue={ispCount} onValueChange={setIspCount}>
                <SelectTrigger className="w-full bg-blue-600 text-white border-none">
                  <SelectValue placeholder="Pilih jumlah" />
                </SelectTrigger>
                <SelectContent className="bg-zinc-800 border-zinc-700">
                  <SelectItem value="1 ISP" className="text-white">1 ISP</SelectItem>
                  <SelectItem value="2 ISP" className="text-white">2 ISP</SelectItem>
                  <SelectItem value="3 ISP" className="text-white">3 ISP</SelectItem>
                  <SelectItem value="4 ISP" className="text-white">4 ISP</SelectItem>
                </SelectContent>
              </Select>
            </div>

            {providers.slice(0, parseInt(ispCount)).map((provider) => (
              <div key={provider.id} className="space-y-3">
                <div className="text-xs text-zinc-500">
                  Provider {provider.id}
                </div>
                <Select defaultValue={provider.provider}>
                  <SelectTrigger className="w-full bg-zinc-800 text-white border-zinc-700">
                    <SelectValue placeholder="Pilih provider" />
                  </SelectTrigger>
                  <SelectContent className="bg-zinc-800 border-zinc-700">
                    {provider.providerOptions.map((option) => (
                      <SelectItem key={option} value={option} className="text-white">
                        {option}
                      </SelectItem>
                    ))}
                  </SelectContent>
                </Select>

                <Select defaultValue={provider.type}>
                  <SelectTrigger className="w-full bg-zinc-800 text-white border-zinc-700">
                    <SelectValue placeholder="Pilih tipe" />
                  </SelectTrigger>
                  <SelectContent className="bg-zinc-800 border-zinc-700">
                    {provider.typeOptions.map((option) => (
                      <SelectItem key={option} value={option} className="text-white">
                        {option}
                      </SelectItem>
                    ))}
                  </SelectContent>
                </Select>

                <Select defaultValue={provider.number}>
                  <SelectTrigger className="w-full bg-zinc-800 text-white border-zinc-700">
                    <SelectValue placeholder="Pilih nomor" />
                  </SelectTrigger>
                  <SelectContent className="bg-zinc-800 border-zinc-700">
                    {provider.numberOptions.map((option) => (
                      <SelectItem key={option} value={option} className="text-white">
                        {option}
                      </SelectItem>
                    ))}
                  </SelectContent>
                </Select>
              </div>
            ))}
          </div>
        </CardContent>
      </Card>
    </div>
  )
}

export default ProviderForm

