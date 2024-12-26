import React, { useEffect, useState } from 'react'
import BaseLayout from '@/Layouts/BaseLayout'
import Button, { ButtonFontSize } from '@/components/hunt/button'
import HuntInput from '@/components/hunt/huntInput'
import Card from '@/components/hunt/card'
function Home() {
    const [answer, setAnswer] = useState('');
    const [isLoading, setIsLoading] = useState(false);
    const submitAnswer = () => {
        console.log(answer);
        setIsLoading(true);
        setTimeout(() => {
            setIsLoading(false);
        }, 2000)
    }

    return (
        <div>
            <div className='text-center mb-4'>
                <h1 className='font-avengeance text-4xl mb-4 uppercase'>Quest 1</h1>
                <p className='text-2xl'>Solve one question to unlock next quest
                    or solve both for more coins</p>
            </div>
            <Button title="Question 1" subtitle='2 Coins' className='my-4' />
            <Card>
                <div className='w-full text-2xl sm:text-3xl font-black font-avengeance text-white uppercase 
                flex items-center justify-between space-x-2'>
                    <p className='font-outline-6 outline-outer'>Quest 1 - Question 1</p>
                    <p className='font-outline-4 outline-outer text-yellow-300 text-xl sm:text-2xl whitespace-nowrap'>2 Coins</p>
                </div>
                <p className='text-2xl my-4 font-bold'>In which arc this character first appeared?</p>
                <Button title="Open Camera - View Model" size={ButtonFontSize.Small} />
            </Card>
            <HuntInput placeholder='Answer Here' value={answer} className='py-4 px-8 w-full'
                onChange={(i) => setAnswer(i)}
                containerClassName='my-4'
            />
            <HuntInput placeholder='Answer Here' className='py-4 px-8 w-full'
                success={true}
                containerClassName='my-4'
            />
            <HuntInput placeholder='Answer Here' className='py-4 px-8 w-full'
                error="Error Message Here"
                containerClassName='my-4'
            />
            <Button
                isLoading={isLoading}
                onClick={submitAnswer}
                title="Submit Answer" size={ButtonFontSize.Small} />
        </div>
    )
}

export default Home

Home.layout = page => <BaseLayout children={page} title='Quests' />
