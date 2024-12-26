import React from 'react'
import { ThreeDot } from 'react-loading-indicators';

export enum ButtonFontSize {
    Small,
    Large,
}

function Button({ title, subtitle, className, size, onClick, isLoading }: { title: string, subtitle?: string, className?: string, size?: ButtonFontSize, onClick?: () => void, isLoading?: boolean }) {
    const fontSize = size === undefined ? ButtonFontSize.Large : size;
    return (
        <button
            disabled={isLoading}
            tabIndex={0}
            onClick={onClick || null}
            className={className + ` w-full card-bg-dotted border-4 border-[#693C17]  py-6 
                font-black font-avengeance text-white uppercase stroke-black rounded-xl
                shadow-[8px_8px_0px_#693C17]
                transition-all
                outline-none
                hover:shadow-[4px_4px_0px_#693C17]
                hover:translate-y-1
                hover:border-[#693C17]
                hover:translate-x-1
                focus:shadow-[4px_4px_0px_#693C17]
                focus:translate-y-1
                focus:border-[#ffffffb3]
                focus:translate-x-1
                cursor-pointer
                active:translate-y-2
                active:translate-x-2
                active:shadow-none
                active:border-[#693C17]
                disabled:translate-x-0
                disabled:translate-y-0
                disabled:border-[#693C17]
                disabled:shadow-[8px_8px_0px_#693C17]
                disabled:cursor-not-allowed
                disabled:opacity-70
                flex items-center space-x-2 ` + (subtitle ? "justify-between" : "justify-center text-center")
                + (fontSize == ButtonFontSize.Large ? " text-3xl sm:text-4xl px-4" :
                    ((fontSize == ButtonFontSize.Small) ? " text-2xl sm:text-3xl px-2" : ""))
            }>
            {isLoading ? <ThreeDot variant="bounce" color="#fff" size="small" text="" textColor="" /> :
                <>
                    <p className='font-outline-6 outline-outer'>{title}</p>
                    {subtitle ?
                        <p className='font-outline-6 outline-outer text-yellow-300 whitespace-nowrap text-2xl sm:text-3xl'>{subtitle}</p>
                        : ""}
                </>
            }
        </button>
    )
}

export default Button;