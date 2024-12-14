// 'use client'

// import { useState } from "react"
// import { Button } from "@/components/ui/button"
// import { Input } from "@/components/ui/input"
// import {
//   Select,
//   SelectContent,
//   SelectItem,
//   SelectTrigger,
//   SelectValue,
// } from "@/components/ui/select"
// import {
//   Table,
//   TableBody,
//   TableCell,
//   TableHead,
//   TableHeader,
//   TableRow,
// } from "@/components/ui/table"
// import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
// import { ArrowLeftCircle, ArrowUpDown } from 'lucide-react'

// export default function VoucherSearch() {
//   const [searchQuery, setSearchQuery] = useState("")

//   const vouchers = [
//     {
//       id: 1,
//       code: "10gywfhc8cx",
//       type: "Voucher Regular",
//       profile: "Kuota 20 GB 15 Hari",
//       comment: "vc-714-04.12.23-a10",
//       importDate: "27/08/2023 11:34 AM",
//       status: "Ready",
//       soldDate: "",
//       user: null,
//     },
//     {
//       id: 2,
//       code: "10gsagr43az",
//       type: "Voucher Flash Sale",
//       profile: "Kuota 30 GB 30 Hari",
//       comment: "vc-714-04.12.23-a10",
//       importDate: "27/08/2023 11:34 AM",
//       status: "Ready",
//       soldDate: "",
//       user: null,
//     },
//     {
//       id: 3,
//       code: "10gjkdf43lk",
//       type: "Voucher Tukar Poin",
//       profile: "Kuota 40 GB 30 Hari",
//       comment: "vc-714-04.12.23-a10",
//       importDate: "27/08/2023 11:34 AM",
//       status: "Ready",
//       soldDate: "",
//       user: null,
//     },
//     {
//       id: 4,
//       code: "10gcbn43fd",
//       type: "Voucher Regular",
//       profile: "Kuota 20 GB 15 Hari",
//       comment: "vc-714-04.12.23-a10",
//       importDate: "27/08/2023 11:34 AM",
//       status: "Sold",
//       soldDate: "28/08/2023 09:34 AM",
//       user: "Andy Kuzon Putra",
//     },
//   ]

//   return (
//     <div className="min-h-screen bg-[#1a1b1e] text-white p-4">
//       <div className="max-w-[1200px] mx-auto space-y-4">
//         {/* Header */}
//         <div className="flex items-center gap-2 text-sm">
//           <Button variant="ghost" size="sm" className="text-blue-400">
//             <ArrowLeftCircle className="h-4 w-4 mr-1" />
//             Rekapan
//           </Button>
//           <span className="text-gray-500">&gt;</span>
//           <span>Cari Voucher</span>
//         </div>

//         {/* Search and Filters */}
//         <div className="space-y-4">
//           <div className="flex gap-2">
//             <Input
//               placeholder="Cari Kode, Comment, Profile dll"
//               value={searchQuery}
//               onChange={(e) => setSearchQuery(e.target.value)}
//               className="bg-[#25262b] border-none"
//             />
//             <Button variant="outline" className="bg-amber-500 hover:bg-amber-600 text-white border-none">
//               Reset Filter
//             </Button>
//             <Button variant="outline" className="bg-red-500 hover:bg-red-600 text-white border-none">
//               Hapus By Filter
//             </Button>
//           </div>

//           <div className="flex flex-wrap gap-2">
//             <Select defaultValue="voucher-tukar-poin">
//               <SelectTrigger className="w-[200px] bg-[#25262b] border-none">
//                 <SelectValue placeholder="Jenis" />
//               </SelectTrigger>
//               <SelectContent>
//                 <SelectItem value="voucher-tukar-poin">Voucher Tukar Poin</SelectItem>
//                 <SelectItem value="voucher-regular">Voucher Regular</SelectItem>
//                 <SelectItem value="voucher-flash-sale">Voucher Flash Sale</SelectItem>
//               </SelectContent>
//             </Select>

//             <Select defaultValue="kuota-20gb">
//               <SelectTrigger className="w-[200px] bg-[#25262b] border-none">
//                 <SelectValue placeholder="Profile" />
//               </SelectTrigger>
//               <SelectContent>
//                 <SelectItem value="kuota-20gb">Kuota 20 GB 15 Hari</SelectItem>
//                 <SelectItem value="kuota-30gb">Kuota 30 GB 30 Hari</SelectItem>
//                 <SelectItem value="kuota-40gb">Kuota 40 GB 30 Hari</SelectItem>
//               </SelectContent>
//             </Select>

//             <Select defaultValue="vc-714">
//               <SelectTrigger className="w-[200px] bg-[#25262b] border-none">
//                 <SelectValue placeholder="Comment" />
//               </SelectTrigger>
//               <SelectContent>
//                 <SelectItem value="vc-714">vc-714-04.12.23-a10</SelectItem>
//               </SelectContent>
//             </Select>

//             <Select defaultValue="27-08">
//               <SelectTrigger className="w-[200px] bg-[#25262b] border-none">
//                 <SelectValue placeholder="Tgl Import" />
//               </SelectTrigger>
//               <SelectContent>
//                 <SelectItem value="27-08">27/08/2023 11:34 AM</SelectItem>
//               </SelectContent>
//             </Select>

//             <Select defaultValue="semua">
//               <SelectTrigger className="w-[200px] bg-[#25262b] border-none">
//                 <SelectValue placeholder="Status" />
//               </SelectTrigger>
//               <SelectContent>
//                 <SelectItem value="semua">Semua</SelectItem>
//                 <SelectItem value="ready">Ready</SelectItem>
//                 <SelectItem value="sold">Sold</SelectItem>
//               </SelectContent>
//             </Select>
//           </div>
//         </div>

//         {/* Table */}
//         <div className="rounded-lg border border-gray-800 overflow-hidden">
//           <Table>
//             <TableHeader className="bg-[#25262b]">
//               <TableRow className="hover:bg-[#2c2d32] border-gray-800">
//                 <TableHead className="text-white">No</TableHead>
//                 <TableHead className="text-white">Kode</TableHead>
//                 <TableHead className="text-white">Jenis</TableHead>
//                 <TableHead className="text-white">Profile</TableHead>
//                 <TableHead className="text-white">Comment</TableHead>
//                 <TableHead className="text-white">
//                   <div className="flex items-center">
//                     Tgl Import
//                     <ArrowUpDown className="ml-2 h-4 w-4" />
//                   </div>
//                 </TableHead>
//                 <TableHead className="text-white">
//                   <div className="flex items-center">
//                     Status
//                     <ArrowUpDown className="ml-2 h-4 w-4" />
//                   </div>
//                 </TableHead>
//                 <TableHead className="text-white">
//                   <div className="flex items-center">
//                     Tgl Terjual
//                     <ArrowUpDown className="ml-2 h-4 w-4" />
//                   </div>
//                 </TableHead>
//               </TableRow>
//             </TableHeader>
//             <TableBody>
//               {vouchers.map((voucher) => (
//                 <TableRow key={voucher.id} className="hover:bg-[#2c2d32] border-gray-800">
//                   <TableCell>{voucher.id}</TableCell>
//                   <TableCell className="font-mono">{voucher.code}</TableCell>
//                   <TableCell>{voucher.type}</TableCell>
//                   <TableCell>{voucher.profile}</TableCell>
//                   <TableCell>{voucher.comment}</TableCell>
//                   <TableCell>{voucher.importDate}</TableCell>
//                   <TableCell>
//                     <span className="inline-flex items-center px-2 py-1 rounded-md bg-blue-500/20 text-blue-400">
//                       {voucher.status}
//                     </span>
//                   </TableCell>
//                   <TableCell>
//                     {voucher.user ? (
//                       <div className="flex items-center gap-2">
//                         <Avatar className="h-6 w-6">
//                           <AvatarImage src="/placeholder.svg" />
//                           <AvatarFallback>AK</AvatarFallback>
//                         </Avatar>
//                         <div className="flex flex-col">
//                           <span className="text-sm">{voucher.user}</span>
//                           <span className="text-xs text-gray-400">{voucher.soldDate}</span>
//                         </div>
//                       </div>
//                     ) : null}
//                   </TableCell>
//                 </TableRow>
//               ))}
//             </TableBody>
//           </Table>
//         </div>

//         {/* Pagination */}
//         <div className="flex items-center justify-between text-sm">
//           <div>Jumlah Voucher: {vouchers.length}</div>
//           <div className="flex items-center gap-2">
//             <Button
//               variant="outline"
//               size="sm"
//               className="bg-blue-500 hover:bg-blue-600 text-white border-none h-8 w-8 p-0"
//             >
//               1
//             </Button>
//             <Button
//               variant="outline"
//               size="sm"
//               className="bg-[#25262b] hover:bg-[#2c2d32] text-white border-none h-8 w-8 p-0"
//             >
//               2
//             </Button>
//             <Button
//               variant="outline"
//               size="sm"
//               className="bg-[#25262b] hover:bg-[#2c2d32] text-white border-none h-8 w-8 p-0"
//             >
//               3
//             </Button>
//           </div>
//         </div>
//       </div>
//     </div>
//   )
// }

