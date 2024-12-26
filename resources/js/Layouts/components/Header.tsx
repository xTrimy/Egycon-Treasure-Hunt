import React from 'react'
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
import { Moon, Sun } from "lucide-react"
import { Button } from "@/components/ui/button"
import getAssetUrl from '../../main'
function Header({ auth, switchTheme }: { auth: any, switchTheme: (boolean) => void }) {
    const [isDark, setIsDark] = React.useState(true)
    React.useEffect(() => {
        localStorage.setItem('dark', 'true')
        if (localStorage.getItem('dark') !== 'true') {
            setIsDark(false)
        }
        if (isDark) {
            document.documentElement.classList.add('dark')
            localStorage.setItem('dark', 'true')
        } else {
            document.documentElement.classList.remove('dark')
            localStorage.setItem('dark', 'false')
        }
        switchTheme(isDark)
    }, []);

    React.useEffect(() => {
        if (isDark) {
            document.documentElement.classList.add('dark')
            localStorage.setItem('dark', 'true')
        } else {
            document.documentElement.classList.remove('dark')
            localStorage.setItem('dark', 'false')
        }
        switchTheme(isDark)
    }, [isDark])

    return (
        <div className='w-full flex lg:px-16 md:px-8 ps-8 pe-4 items-center justify-center relative'>
            <div className='flex items-center justify-center'>
                <img className="w-96 max-w-full" src={getAssetUrl() + "asset/logoHunt.png"} alt="EGYcon Pumpkin Island Logo" />
            </div>
        </div >
    )
}

export default Header