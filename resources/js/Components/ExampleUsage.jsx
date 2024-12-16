import React from 'react'
import { Button } from "@/components/ui/button"

export function ExampleUsage() {
  return (
    <div className="space-y-4">
      <Button>Default Button</Button>
      <Button variant="destructive">Destructive Button</Button>
      <Button variant="outline">Outline Button</Button>
      <Button variant="secondary">Secondary Button</Button>
      <Button variant="ghost">Ghost Button</Button>
      <Button variant="link">Link Button</Button>
      <Button size="sm">Small Button</Button>
      <Button size="lg">Large Button</Button>
      <Button size="icon">
        <span className="sr-only">Icon</span>
        ★
      </Button>
    </div>
  )
}

