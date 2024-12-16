import React, { useState } from 'react'
import { Card, CardContent, CardHeader } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Lock } from 'lucide-react'

function LocationByNameLocation() {
  const [location, setLocation] = useState({
    name: '',
    address: ''
  })

  const handleChange = (e) => {
    const { name, value } = e.target
    setLocation(prev => ({
      ...prev,
      [name]: value
    }))
  }

  const handleSubmit = (e) => {
    e.preventDefault()
    // Handle form submission
    console.log('Location data:', location)
  }

  return (
    <div className="min-h-screen bg-black p-4">
      <Card className="max-w-md mx-auto bg-zinc-900 border-zinc-800">
        <CardHeader className="space-y-4 p-4">
          <div className="text-sm text-center text-zinc-400">Identitas</div>
          <div className="flex items-center justify-between bg-blue-600 rounded-lg p-3">
            <div className="flex items-center gap-2">
              <div className="w-6 h-6 bg-zinc-900 rounded flex items-center justify-center text-xs text-white">
                01
              </div>
              <div className="flex items-center gap-1">
                <Lock className="w-4 h-4 text-white" />
                <span className="text-sm text-white">(Kosong)</span>
              </div>
            </div>
            <div className="flex flex-col items-end text-xs text-white">
              <span>DC</span>
              <span>VC</span>
              <span>BD</span>
            </div>
          </div>
        </CardHeader>
        <CardContent className="p-4">
          <form onSubmit={handleSubmit} className="space-y-4">
            <div className="space-y-2">
              <Label htmlFor="name" className="text-zinc-400">
                Nama Lokasi
              </Label>
              <Input
                id="name"
                name="name"
                value={location.name}
                onChange={handleChange}
                className="bg-zinc-800 border-zinc-700 text-white"
                placeholder="Masukkan nama lokasi"
              />
            </div>
            <div className="space-y-2">
              <Label htmlFor="address" className="text-zinc-400">
                Alamat Lokasi
              </Label>
              <Input
                id="address"
                name="address"
                value={location.address}
                onChange={handleChange}
                className="bg-zinc-800 border-zinc-700 text-white"
                placeholder="Masukkan alamat lokasi"
              />
            </div>
          </form>
        </CardContent>
      </Card>
    </div>
  )
}

export default LocationByNameLocation

