import { FileInfo } from './fileinfo.js';


export function active(node, routeName) {
    const current = route().current();

    if (current === routeName) {
        // Highlight the link itself
        node.classList.add('bg-[#4634ff]');

        // Find the closest <summary> inside a parent <li> and highlight it
        const li = node.closest('li');
        if (li) {
            const summary = li.querySelector('summary');
            if (summary) {
                summary.classList.add('bg-[#4634ff]');
            }

            // Open <details> if present
            const details = li.querySelector('details');
            if (details) {
                details.open = true;
            }
        }
    }

    return {
        destroy() {
            node.classList.remove('bg-[#4634ff]');
        }
    };
}

export function append_query(url, key, value) {
    const newUrl = new URL(url, window.location.origin);
    newUrl.searchParams.set(key, value);
    return newUrl.toString();
}

export function get_file_size(key) {
    return FileInfo[key]?.size || null;
}

export function get_file_path(key) {
    return FileInfo[key]?.path || '';
}

export function get_image(image, key = null) {
    // If no image provided → fallback
    if (!image) {
        if (key && FileInfo[key]?.size) {
            return `/placeholder/image/${FileInfo[key].size}`;
        }
        return '/assets/images/default.png';
    }

    // If the second parameter is a FileInfo key
    if (key && FileInfo[key]) {
        const { path } = FileInfo[key];
        const cleanImage = image.replace(/^\/+/, '');
        return `${path}/${cleanImage}`;
    }

    // Otherwise, return image relative to project root
    return `/${image.replace(/^\/+/, '')}`;
}

export function search_url(currentUrl) {
    const url = new URL(currentUrl, window.location.origin);
    url.searchParams.delete('page'); // Remove page parameter when searching
    return url.pathname + url.search;
}

export function site_logo(type = null) {
    const name = type ? `/logo_${type}.png` : '/logo.png';
    return get_image(get_file_path('logoIcon') + name);
}

export function site_favicon() {
    return get_image('favicon.png', 'logoIcon');
}

export function str_limit(text = "", length = 10) {
    if (!text) return "";
    return text.length > length ? text.substring(0, length) + "…" : text;
}