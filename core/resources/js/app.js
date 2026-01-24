import './bootstrap';
import '../css/app.css';
import '@tailwindplus/elements'
import 'preline'

import { createInertiaApp } from '@inertiajs/svelte'
import { mount } from 'svelte'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./pages/**/*.svelte', { eager: true })
        return pages[`./pages/${name}.svelte`]
    },
    setup({ el, App, props }) {
        mount(App, { target: el, props })
    },
    progress: { color: '#4855DC' },
})