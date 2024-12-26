import React, { useEffect } from 'react'
import { usePage } from '@inertiajs/react'
import Header from './components/Header'

function BaseLayout({ children }) {

  const { auth } = usePage().props
  const [isDarkMode, setIsDarkMode] = React.useState(false)
  const switchTheme = (isDark) => {
    setIsDarkMode(isDark)
  }
  const documentLoader = document.getElementById('document-loader');
  useEffect(() => {
    // setTimeout(() => { // simulate a page load
    setTimeout(() => { // guarentee component is rendered
      documentLoader.style.display = "none";
    }, 200);
    // }, 8000);
  }, [])
  return (
    <div className='w-full h-full body-bg font-alexandria'>
      <div className="body-bg-pattern w-full h-full">
        <div className='w-full max-w-3xl mx-auto min-h-[calc(100vh-7rem)] py-4 '>
          <div className='w-full h-full'>
            <Header auth={auth} switchTheme={switchTheme} />
            <div className='lg:px-16 md:px-8 px-4'>
              {children}
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default BaseLayout