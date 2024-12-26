import BaseLayout from '@/Layouts/BaseLayout'
import { Head } from '@inertiajs/react'
import { UndrawLost } from 'react-undraw-illustrations'
function ErrorPage({ status, message }) {
    const titles = {
        503: '503: Service Unavailable',
        500: '500: Server Error',
        404: '404: Page Not Found',
        403: '403: Forbidden',
        0: `${status}: Error`,
    }
    const illustrations = {
        0: <UndrawLost primaryColor='#8244ad' height='250px' />,
    }
    const title = titles[status] || titles[0]
    const illustration = illustrations[status] || illustrations[0]

    return (
        <div>
            <Head title={title} />
            <h1 className='text-4xl'>{title}</h1>
            <div>{message}</div>
            <div>{illustration}</div>
        </div>
    )
}

ErrorPage.layout = page => <BaseLayout children={page} />

export default ErrorPage