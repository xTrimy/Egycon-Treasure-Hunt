import React, { forwardRef, Ref, useEffect, useState } from 'react'

interface HuntInputProps {
    placeholder?: string,
    value?: string,
    className?: string,
    containerClassName?: string,
    onChange?: (input: string) => void,
    error?: string,
    success?: boolean
}

const HuntInput = forwardRef<HTMLInputElement, HuntInputProps>(
    function (
        { placeholder, value, className, onChange, error, containerClassName, success }: HuntInputProps,
        ref?: Ref<HTMLInputElement>,
    ) {
        const [inputValue, setInputValue] = useState(value || '');

        useEffect(() => {
            if (onChange)
                onChange(inputValue)
        }, [inputValue]);

        return (
            <div className={containerClassName ?? ''}>
                <input ref={ref} value={inputValue} onChange={(e) => setInputValue(e.target.value)} placeholder={placeholder || ''}
                    className={(className || '') + ` placeholder:text-[#ffffffB3] text-center outline-none border-2 bg-[#6a4f37] 
                      rounded-lg
                     focus:border-[#ffffff] `
                        + ((error && error.length > 0) ? "border-red-500" : ((success) ? "border-green-500" : "border-[#D2975F]"))
                    } />
                {(error && error.length > 0) ?
                    <p className='text-red-500 mt-2 font-bold'>
                        {error}
                    </p> : ""}
            </div>
        )
    });

export default HuntInput