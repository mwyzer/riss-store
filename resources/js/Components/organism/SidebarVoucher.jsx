"use client"

import React, { useState } from "react"
import { Star, Zap, Award, ChevronDown } from 'lucide-react'
import { cn } from "@/lib/utils"

import {
  Sidebar,
  SidebarContent,
  SidebarGroup,
  SidebarGroupContent,
  SidebarGroupLabel,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
} from "@/components/ui/sidebar"

const voucherSections = [
  {
    icon: Star,
    label: "Rekapan",
    type: "summary",
    options: []
  },
  {
    icon: Award,
    label: "Voucher - Regular",
    type: "regular",
    options: [
      { quota: "Kuota 20 GB", duration: "15 Hari" },
      { quota: "Kuota 30 GB", duration: "30 Hari", isSelected: true },
      { quota: "Kuota 40 GB", duration: "30 Hari" },
      { quota: "Unlimited", duration: "15 Hari" },
    ]
  },
  {
    icon: Zap,
    label: "Voucher - Flash Sale",
    type: "flash",
    options: []
  },
  {
    icon: Award,
    label: "Voucher - Tukar Poin",
    type: "points",
    options: []
  }
]

export default function SidebarVoucher() {
  const [openSections, setOpenSections] = useState({
    summary: false,
    regular: true,
    flash: false,
    points: false
  })

  const toggleSection = (type) => {
    setOpenSections(prev => ({ ...prev, [type]: !prev[type] }))
  }

  return (
    <Sidebar className="border-r-0 bg-zinc-900">
      <SidebarContent>
        {voucherSections.map((section) => (
          <SidebarGroup key={section.type}>
            <SidebarGroupLabel 
              className="flex items-center justify-between gap-2 text-zinc-400 cursor-pointer"
              onClick={() => toggleSection(section.type)}
            >
              <div className="flex items-center gap-2">
                <section.icon className="h-4 w-4" />
                <span>{section.label}</span>
              </div>
              <ChevronDown 
                className={cn(
                  "h-4 w-4 transition-transform duration-200",
                  openSections[section.type] && "transform rotate-180"
                )}
              />
            </SidebarGroupLabel>
            {openSections[section.type] && section.options.length > 0 && (
              <SidebarGroupContent>
                <SidebarMenu>
                  {section.options.map((option, index) => (
                    <SidebarMenuItem key={index}>
                      <SidebarMenuButton
                        className={cn(
                          "flex flex-col items-start gap-1 text-zinc-300 hover:bg-zinc-800 hover:text-zinc-100",
                          option.isSelected && "bg-blue-600 text-white hover:bg-blue-700"
                        )}
                      >
                        <span className="font-medium">{option.quota}</span>
                        <span className="text-xs opacity-80">{option.duration}</span>
                      </SidebarMenuButton>
                    </SidebarMenuItem>
                  ))}
                </SidebarMenu>
              </SidebarGroupContent>
            )}
          </SidebarGroup>
        ))}
      </SidebarContent>
    </Sidebar>
  )
}

