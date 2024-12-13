'use client'

import { useState } from 'react'
import { Line, LineChart, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card"
import { ChartContainer } from "@/components/ui/chart"

const generateDummyData = () => {
  const baseValues = {
    broadband: 500000,
    totalIncome: 1000000,
    tagihan: 300000,
    voucher: 200000,
    dedicated: 400000
  }

  return Array.from({ length: 30 }, (_, i) => {
    const day = i + 1
    const date = new Date(2023, 8, day) // September 2023
    const weekday = date.getDay()
    const isWeekend = weekday === 0 || weekday === 6

    // Add some randomness and weekend boost
    const randomFactor = Math.random() * 0.4 + 0.8 // 0.8 to 1.2
    const weekendBoost = isWeekend ? 1.2 : 1

    return {
      day,
      date: date.toISOString().split('T')[0], // YYYY-MM-DD format
      broadband: Math.round(baseValues.broadband * randomFactor * weekendBoost) || 0,
      totalIncome: Math.round(baseValues.totalIncome * randomFactor * weekendBoost) || 0,
      tagihan: Math.round(baseValues.tagihan * randomFactor) || 0,
      voucher: Math.round(baseValues.voucher * randomFactor * weekendBoost) || 0,
      dedicated: Math.round(baseValues.dedicated * randomFactor) || 0,
    }
  })
}

export function DailyChart() {
  const [data] = useState(() => {
  const dummyData = generateDummyData();
  console.log("Dummy Data:", dummyData);
  return dummyData;
});
  
  const formatCurrency = (value) => {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(value).replace('IDR', 'Rp')
  }

  const formatDate = (dateString) => {
    const date = new Date(dateString)
    return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })
  }

  return (
    <Card className="bg-zinc-800 border-none text-white">
      <CardHeader className="pb-4">
        <CardTitle className="text-lg font-medium">Chart Harian</CardTitle>
        <div className="flex flex-wrap gap-3 mt-4">
          <Select defaultValue="semua">
            <SelectTrigger className="w-[140px] bg-zinc-700 border-none">
              <SelectValue placeholder="Chart" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="semua">Semua</SelectItem>
            </SelectContent>
          </Select>

          <Select defaultValue="semua">
            <SelectTrigger className="w-[140px] bg-zinc-700 border-none">
              <SelectValue placeholder="Pembayaran" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="semua">Semua</SelectItem>
            </SelectContent>
          </Select>

          <Select defaultValue="semua">
            <SelectTrigger className="w-[140px] bg-zinc-700 border-none">
              <SelectValue placeholder="Lokasi Wifi" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="semua">Semua</SelectItem>
            </SelectContent>
          </Select>

          <Select defaultValue="semua">
            <SelectTrigger className="w-[140px] bg-zinc-700 border-none">
              <SelectValue placeholder="Costumer" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="semua">Semua</SelectItem>
            </SelectContent>
          </Select>

          <Select defaultValue="sept2023">
            <SelectTrigger className="w-[140px] bg-zinc-700 border-none">
              <SelectValue placeholder="Period" />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="sept2023">Sept 2023</SelectItem>
            </SelectContent>
          </Select>

          <div className="flex gap-2 ml-auto">
            <Button className="bg-green-600 hover:bg-green-700">Apply</Button>
            <Button variant="destructive">Reset</Button>
          </div>
        </div>
      </CardHeader>
      <CardContent>
        <ChartContainer className="h-[400px]">
          <ResponsiveContainer width="100%" height="100%">
            <LineChart data={data} margin={{ top: 20, right: 30, left: 20, bottom: 5 }}>
              <CartesianGrid strokeDasharray="3 3" stroke="#444" />
              <XAxis 
                dataKey="day" 
                stroke="#666"
                tick={{ fill: '#999' }}
              />
              <YAxis 
                stroke="#666"
                tick={{ fill: '#999' }}
                tickFormatter={formatCurrency}
              />
              <Tooltip 
                content={({ active, payload, label }) => {
                  if (!active || !payload || payload.length === 0) {
                    return <div className="bg-zinc-900 p-2 rounded border border-zinc-700">No data available</div>;
                  }
                  const dateObj = payload[0]?.payload;
                  return (
                    <div className="bg-zinc-900 p-2 rounded border border-zinc-700">
                      <p className="text-white font-bold mb-1">{formatDate(dateObj.date)}</p>
                      {payload.map((entry, index) => (
                        <div key={index} className="text-sm">
                          <span style={{ color: entry.color }}>{entry.name}: </span>
                          <span className="text-white">{formatCurrency(entry.value || 0)}</span>
                        </div>
                      ))}
                    </div>
                  );
                }}
              />
              <Legend 
                wrapperStyle={{ color: '#fff' }}
              />
              <Line 
                type="monotone" 
                dataKey="broadband" 
                stroke="#8884d8" 
                dot={false}
                name="Broadband"
              />
              <Line 
                type="monotone" 
                dataKey="totalIncome" 
                stroke="#4ade80" 
                dot={false}
                name="Total Income"
              />
              <Line 
                type="monotone" 
                dataKey="tagihan" 
                stroke="#ef4444" 
                dot={false}
                name="Tagihan"
              />
              <Line 
                type="monotone" 
                dataKey="voucher" 
                stroke="#fbbf24" 
                dot={false}
                name="Voucher"
              />
              <Line 
                type="monotone" 
                dataKey="dedicated" 
                stroke="#60a5fa" 
                dot={false}
                name="Dedicated"
              />
            </LineChart>
          </ResponsiveContainer>
        </ChartContainer>
      </CardContent>
    </Card>
  )
}

