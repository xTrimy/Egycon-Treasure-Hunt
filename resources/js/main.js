require("./bootstrap");
import { createInertiaApp } from '@inertiajs/react'
import React from 'react';
import { createRoot } from 'react-dom/client'

let assetUrl = '';

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props }) {
        console.log(props.initialPage.props);
        assetUrl = props.initialPage.props.assetUrl || '';
        createRoot(el).render(<App {...props} />)
    },
})

export default function getAssetUrl() {
    return assetUrl;
}
