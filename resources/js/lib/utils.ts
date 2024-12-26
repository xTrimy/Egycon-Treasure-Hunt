import { clsx, type ClassValue } from "clsx"
import { twMerge } from "tailwind-merge"

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs))
}


export function nameInitials(name: string, onlyTwo: boolean = true) {
  const names = name.split(' ')
  if (onlyTwo) {
    return names.slice(0, 2).map(name => name[0]).join('')
  }
  return names.map(name => name[0]).join('')
}