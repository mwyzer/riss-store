'use client'

import { Card } from "@/components/ui/card"
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Button } from "@/components/ui/button"
import { BarChartIcon as ChartBarIcon, ShoppingCartIcon } from 'lucide-react'

export default function VoucherDashboard() {
  return (
    <div className="p-4 space-y-6 max-w-[900px] mx-auto">
      {/* Income Section */}
      <div className="grid gap-4">
        <div className="flex items-center justify-between">
          <div className="flex items-center gap-2">
            <h2 className="text-lg font-semibold">Income</h2>
            <Button variant="ghost" size="sm">Profile</Button>
          </div>
          <div className="flex items-center gap-2">
            <Select defaultValue="september">
              <SelectTrigger className="w-32">
                <SelectValue placeholder="Month" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="september">September</SelectItem>
              </SelectContent>
            </Select>
            <Select defaultValue="2023">
              <SelectTrigger className="w-24">
                <SelectValue placeholder="Year" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="2023">2023</SelectItem>
              </SelectContent>
            </Select>
          </div>
        </div>

        {/* Income Cards */}
        <div className="space-y-2">
          <Card className="p-4 bg-emerald-50">
            <div className="flex justify-between items-center">
              <div className="flex items-center gap-2">
                <div className="bg-emerald-100 p-2 rounded">
                  <ShoppingCartIcon className="h-5 w-5 text-emerald-600" />
                </div>
                <div>
                  <div className="text-sm font-medium">Voucher Regular</div>
                  <Select defaultValue="all">
                    <SelectTrigger className="w-24 h-7 text-xs">
                      <SelectValue placeholder="Type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">Semua</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
              </div>
              <div className="text-right">
                <div className="text-sm">Rp 7.132.444</div>
                <div className="text-sm font-medium">Rp 23.232.444</div>
              </div>
            </div>
          </Card>

          <Card className="p-4 bg-orange-50">
            <div className="flex justify-between items-center">
              <div className="flex items-center gap-2">
                <div className="bg-orange-100 p-2 rounded">
                  <ShoppingCartIcon className="h-5 w-5 text-orange-600" />
                </div>
                <div>
                  <div className="text-sm font-medium">Voucher Flash Sale</div>
                  <Select defaultValue="all">
                    <SelectTrigger className="w-24 h-7 text-xs">
                      <SelectValue placeholder="Type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">Semua</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
              </div>
              <div className="text-right">
                <div className="text-sm">Rp 8.103.442</div>
                <div className="text-sm font-medium">Rp 17.123.442</div>
              </div>
            </div>
          </Card>

          <Card className="p-4 bg-amber-50">
            <div className="flex justify-between items-center">
              <div className="flex items-center gap-2">
                <div className="bg-amber-100 p-2 rounded">
                  <ShoppingCartIcon className="h-5 w-5 text-amber-600" />
                </div>
                <div>
                  <div className="text-sm font-medium">Voucher Tukar Poin</div>
                  <Select defaultValue="all">
                    <SelectTrigger className="w-24 h-7 text-xs">
                      <SelectValue placeholder="Type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">Semua</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
              </div>
              <div className="text-right">
                <div className="text-sm">368 Poin</div>
                <div className="text-sm font-medium">5.322 Poin</div>
              </div>
            </div>
          </Card>

          <Card className="p-4 bg-blue-600 text-white">
            <div className="flex justify-between items-center">
              <div className="text-sm font-medium">Total</div>
              <div className="text-right">
                <div className="text-sm">Rp 15.314.221</div>
                <div className="text-sm font-medium">Rp 43.114.221</div>
              </div>
            </div>
          </Card>
        </div>

        <div className="flex justify-end gap-2">
          <Button variant="outline" className="gap-2">
            <ShoppingCartIcon className="h-4 w-4" />
            Cari Voucher
          </Button>
          <Button variant="outline" className="gap-2">
            <ChartBarIcon className="h-4 w-4" />
            Income Chart
          </Button>
        </div>
      </div>

      {/* Voucher Tables */}
      <div className="space-y-6">
        {/* Regular Voucher Table */}
        <Card className="bg-emerald-50/50">
          <Table>
            <TableHeader>
              <TableRow>
                <TableHead className="w-[200px]">Voucher Regular</TableHead>
                <TableHead>Status</TableHead>
                <TableHead>Import</TableHead>
                <TableHead>Stock</TableHead>
                <TableHead>Hari ini</TableHead>
                <TableHead>Bulan ini</TableHead>
                <TableHead>Semua</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              {['Kuota 20 GB 15 Hari', 'Kuota 30 GB 30 Hari', 'Kuota 40 GB 30 Hari', 'Unlimited 15 Hari'].map((item) => (
                <TableRow key={item}>
                  <TableCell className="font-medium">{item}</TableCell>
                  <TableCell>
                    <div className="bg-green-500 text-white text-xs rounded px-2 py-0.5 w-fit">ON</div>
                  </TableCell>
                  <TableCell>9.886 Pcs</TableCell>
                  <TableCell>60 Pcs</TableCell>
                  <TableCell>4.211 Pcs</TableCell>
                  <TableCell>5.322 Pcs</TableCell>
                  <TableCell>9.421 Pcs</TableCell>
                </TableRow>
              ))}
            </TableBody>
          </Table>
        </Card>

        {/* Flash Sale Table */}
        <Card className="bg-orange-50/50">
          <Table>
            <TableHeader>
              <TableRow>
                <TableHead className="w-[200px]">Voucher - Flash Sale</TableHead>
                <TableHead>Status</TableHead>
                <TableHead>Import</TableHead>
                <TableHead>Stock</TableHead>
                <TableHead>Hari ini</TableHead>
                <TableHead>Bulan ini</TableHead>
                <TableHead>Semua</TableHead>
                <TableHead>Sisa Durasi</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              {['Kuota 20 GB 15 Hari', 'Kuota 30 GB 30 Hari', 'Kuota 40 GB 30 Hari', 'Unlimited 15 Hari'].map((item) => (
                <TableRow key={item}>
                  <TableCell className="font-medium">{item}</TableCell>
                  <TableCell>
                    <div className="bg-green-500 text-white text-xs rounded px-2 py-0.5 w-fit">ON</div>
                  </TableCell>
                  <TableCell>9.886 Pcs</TableCell>
                  <TableCell>60 Pcs</TableCell>
                  <TableCell>4.211 Pcs</TableCell>
                  <TableCell>5.322 Pcs</TableCell>
                  <TableCell>9.421 Pcs</TableCell>
                  <TableCell className="text-red-500">00:11:32</TableCell>
                </TableRow>
              ))}
            </TableBody>
          </Table>
        </Card>

        {/* Point Exchange Table */}
        <Card className="bg-amber-50/50">
          <Table>
            <TableHeader>
              <TableRow>
                <TableHead className="w-[200px]">Voucher - Tukar Poin</TableHead>
                <TableHead>Status</TableHead>
                <TableHead>Import</TableHead>
                <TableHead>Stock</TableHead>
                <TableHead>Hari ini</TableHead>
                <TableHead>Bulan ini</TableHead>
                <TableHead>Semua</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              {['Kuota 20 GB 15 Hari', 'Kuota 30 GB 30 Hari'].map((item) => (
                <TableRow key={item}>
                  <TableCell className="font-medium">{item}</TableCell>
                  <TableCell>
                    <div className="bg-green-500 text-white text-xs rounded px-2 py-0.5 w-fit">ON</div>
                  </TableCell>
                  <TableCell>9.886 Pcs</TableCell>
                  <TableCell>60 Pcs</TableCell>
                  <TableCell>4.211 Pcs</TableCell>
                  <TableCell>5.322 Pcs</TableCell>
                  <TableCell>9.421 Pcs</TableCell>
                </TableRow>
              ))}
            </TableBody>
          </Table>
        </Card>
      </div>
    </div>
  )
}

