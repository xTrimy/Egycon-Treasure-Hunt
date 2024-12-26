import React, { ReactNode } from 'react'

function Card({ className, children }: { className?: string, children?: ReactNode }) {
    return (
        <div className={className + ` w-full card-bg-dotted card-bg-low border-4 border-[#693C17] px-4 py-6 rounded-xl`}>
            {children}
        </div>
    )
}

export default Card