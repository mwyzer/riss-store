'use client'

import { Badge } from './badge'
import { Edit2 } from 'lucide-react'

const data = [
  {
    id: 1,
    time: '10:42',
    customer: 'Stephanus Lugan',
    type: 'DC',
    quantity: '1 Pcs',
    amount: 35000,
    profit: 35000
  },
  {
    id: 2,
    time: '09:28',
    customer: 'Kristoper Junior',
    type: 'VC',
    quantity: '1 Pcs',
    amount: 35000,
    profit: 35000
  },
  {
    id: 3,
    time: '07:18',
    customer: 'Hamid Rahman',
    type: 'VC',
    quantity: '1 Pcs',
    amount: 245000,
    profit: 245000
  }
]

export default function LogIncome() {
  const formatCurrency = (amount) => {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(amount).replace('IDR', 'Rp')
  }

  return (
    <div className="bg-blue-950 text-white p-4 rounded-lg">
      <div className="flex justify-between items-center mb-4">
        <h2 className="text-lg font-medium">Log Income • 30 September 2023</h2>
        <span className="text-sm text-green-400">Ubah</span>
      </div>

      <div className="overflow-x-auto">
        <table className="w-full">
          <thead>
            <tr className="text-left text-sm border-b border-blue-900">
              <th className="pb-2">Jam</th>
              <th className="pb-2">Customer</th>
              <th className="pb-2">Jenis</th>
              <th className="pb-2">Jumlah</th>
              <th className="pb-2">Profit</th>
              <th className="pb-2">Ubah</th>
            </tr>
          </thead>
          <tbody>
            {data.map((item) => (
              <tr key={item.id} className="border-b border-blue-900/50">
                <td className="py-2 text-sm">{item.time}</td>
                <td className="py-2 text-sm text-blue-400">{item.customer}</td>
                <td className="py-2">
                  <Badge type={item.type} />
                </td>
                <td className="py-2 text-sm">{item.quantity}</td>
                <td className="py-2 text-sm text-green-400">{formatCurrency(item.amount)}</td>
                <td className="py-2">
                  <button className="text-blue-400 hover:text-blue-300">
                    <Edit2 className="w-4 h-4" />
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  )
}

