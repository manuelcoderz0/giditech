<script>
    export let open = false;
    import { site_logo, site_favicon, get_image, active } from '@/js/stores/helpers.js';
    import { inertia, page } from '@inertiajs/svelte';

    import { createEventDispatcher } from 'svelte';
    const dispatch = createEventDispatcher();

    function close_sidebar() {
        open = false;
        dispatch("close");
    }
    //console.log($page.url);
</script>

<div class="w-[250px] fixed top-0 left-0 z-[999] h-full bg-[#071251] border-r border-gray-700 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out" class:translate-x-0={open}>
    <!-- Close Button (mobile only) -->
    <button aria-hidden="true" class="absolute top-0 -right-8 w-[35px] h-[35px] bg-[#4634ff] text-white lg:hidden" on:click={close_sidebar} class:hidden={!open}>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
            <path d="M18 6L6.00081 17.9992M17.9992 18L6 6.00085" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <div class="relative z-11111 flex flex-col justify-between h-screen">
        <div class="flex flex-wrap items-center text-center flex-shrink-0 px-3 py-4">
            <a href="{ route('admin.dashboard') }" use:inertia={{ prefetch: true }} class="w-[90%]">
                <!-- svelte-ignore a11y_img_redundant_alt -->
                <img src="{ site_logo('dark') }" alt="image" class="w-full max-h-[75px]">
            </a>
        </div>
        <div class="overflow-y-auto flex-1">
            <ul class="flex flex-col">
                <li class="mt-4 mx-3">
                    <a href="{ route('admin.dashboard') }" use:inertia={{ prefetch: true }} use:active={'admin.dashboard'}  class="flex flex-wrap gap-2 items-center text-gray-300 px-2 py-2 rounded-md hover:bg-[#4634ff] transition-all duration-300 ease-out">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 11.9896V14.5C3 17.7998 3 19.4497 4.02513 20.4749C5.05025 21.5 6.70017 21.5 10 21.5H14C17.2998 21.5 18.9497 21.5 19.9749 20.4749C21 19.4497 21 17.7998 21 14.5V11.9896C21 10.3083 21 9.46773 20.6441 8.74005C20.2882 8.01237 19.6247 7.49628 18.2976 6.46411L16.2976 4.90855C14.2331 3.30285 13.2009 2.5 12 2.5C10.7991 2.5 9.76689 3.30285 7.70242 4.90855L5.70241 6.46411C4.37533 7.49628 3.71179 8.01237 3.3559 8.74005C3 9.46773 3 10.3083 3 11.9896Z" />
                            <path d="M15 21.5V16.5C15 15.0858 15 14.3787 14.5607 13.9393C14.1213 13.5 13.4142 13.5 12 13.5C10.5858 13.5 9.87868 13.5 9.43934 13.9393C9 14.3787 9 15.0858 9 16.5V21.5" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li class="mt-4 mx-3">
                    <a href="{ route('admin.category.index') }" use:inertia={{ prefetch: true }} use:active={'admin.category.index'}  class="flex flex-wrap gap-2 items-center text-gray-300 px-2 py-2 rounded-md hover:bg-[#4634ff] transition-all duration-300 ease-out">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 11.9896V14.5C3 17.7998 3 19.4497 4.02513 20.4749C5.05025 21.5 6.70017 21.5 10 21.5H14C17.2998 21.5 18.9497 21.5 19.9749 20.4749C21 19.4497 21 17.7998 21 14.5V11.9896C21 10.3083 21 9.46773 20.6441 8.74005C20.2882 8.01237 19.6247 7.49628 18.2976 6.46411L16.2976 4.90855C14.2331 3.30285 13.2009 2.5 12 2.5C10.7991 2.5 9.76689 3.30285 7.70242 4.90855L5.70241 6.46411C4.37533 7.49628 3.71179 8.01237 3.3559 8.74005C3 9.46773 3 10.3083 3 11.9896Z" />
                            <path d="M15 21.5V16.5C15 15.0858 15 14.3787 14.5607 13.9393C14.1213 13.5 13.4142 13.5 12 13.5C10.5858 13.5 9.87868 13.5 9.43934 13.9393C9 14.3787 9 15.0858 9 16.5V21.5" />
                        </svg>
                        Categories
                    </a>
                </li>

                <li class="mt-2 mx-3">
                    <details class="group text-gray-300">
                        <summary class="flex cursor-pointer items-center justify-between px-2 py-2 rounded-md hover:bg-[#4634ff] transition list-none">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15.5 11C15.5 9.067 13.933 7.5 12 7.5C10.067 7.5 8.5 9.067 8.5 11C8.5 12.933 10.067 14.5 12 14.5C13.933 14.5 15.5 12.933 15.5 11Z" />
                                    <path d="M15.4827 11.3499C15.8047 11.4475 16.1462 11.5 16.5 11.5C18.433 11.5 20 9.933 20 8C20 6.067 18.433 4.5 16.5 4.5C14.6851 4.5 13.1928 5.8814 13.0173 7.65013" />
                                    <path d="M10.9827 7.65013C10.8072 5.8814 9.31492 4.5 7.5 4.5C5.567 4.5 4 6.067 4 8C4 9.933 5.567 11.5 7.5 11.5C7.85381 11.5 8.19535 11.4475 8.51727 11.3499"/>
                                    <path d="M22 16.5C22 13.7386 19.5376 11.5 16.5 11.5"/>
                                    <path d="M17.5 19.5C17.5 16.7386 15.0376 14.5 12 14.5C8.96243 14.5 6.5 16.7386 6.5 19.5"/>
                                    <path d="M7.5 11.5C4.46243 11.5 2 13.7386 2 16.5" />
                                </svg>
                                Manage Posts
                            </span>
                            <!-- Arrow -->
                            <svg class="w-4 h-4 transition-transform group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" >
                                <path d="M18 9.00005C18 9.00005 13.5811 15 12 15C10.4188 15 6 9 6 9" />
                            </svg>
                        </summary>

                        <!-- Submenu -->
                        <div class="ml-2 mt-2 flex flex-col space-y-1">
                            <a href="{ route('admin.post.index') }" use:inertia={{ prefetch: true }} use:active={'admin.post.index'} class="flex items-center px-3 py-2 rounded-md hover:bg-[#4634ff]">
                                <svg class="w-2 h-2 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                </svg>
                                Active Posts
                            </a>
                        </div>
                    </details>
                </li>
            </ul>
        </div>
    </div>
</div>
