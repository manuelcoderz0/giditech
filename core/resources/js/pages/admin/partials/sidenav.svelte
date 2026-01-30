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

                <li class="mt-2 mx-3">
                    <a href="{ route('admin.category.index') }" use:inertia={{ prefetch: true }} use:active={'admin.category.index'}  class="flex flex-wrap gap-2 items-center text-gray-300 px-2 py-2 rounded-md hover:bg-[#4634ff] transition-all duration-300 ease-out">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 14H8.42109C9.35119 14 9.81624 14 9.94012 14.2801C10.064 14.5603 9.74755 14.8963 9.11466 15.5684L5.47691 19.4316C4.84402 20.1037 4.52757 20.4397 4.65145 20.7199C4.77533 21 5.24038 21 6.17048 21H10" />
                            <path d="M4 9L6.10557 4.30527C6.49585 3.43509 6.69098 3 7 3C7.30902 3 7.50415 3.43509 7.89443 4.30527L10 9" />
                            <path d="M17.5 20V4M17.5 20C16.7998 20 15.4915 18.0057 15 17.5M17.5 20C18.2002 20 19.5085 18.0057 20 17.5" />
                        </svg>
                        Categories
                    </a>
                </li>

                <li class="mt-2 mx-3">
                    <details class="group text-gray-300">
                        <summary class="flex cursor-pointer items-center justify-between px-2 py-2 rounded-md hover:bg-[#4634ff] transition list-none">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19.7502 11V10C19.7502 6.22876 19.7502 4.34315 18.5786 3.17157C17.407 2 15.5214 2 11.7502 2H10.7503C6.97907 2 5.09347 2 3.9219 3.17156C2.75033 4.34312 2.75031 6.22872 2.75028 9.99993L2.75024 14C2.75021 17.7712 2.7502 19.6568 3.92173 20.8284C5.0933 21.9999 6.97898 22 10.7502 22" />
                                    <path d="M7.25024 7H15.2502M7.25024 12H15.2502" />
                                    <path d="M13.2502 20.8268V22H14.4236C14.833 22 15.0377 22 15.2217 21.9238C15.4058 21.8475 15.5505 21.7028 15.84 21.4134L20.6636 16.5894C20.9366 16.3164 21.0731 16.1799 21.1461 16.0327C21.285 15.7525 21.285 15.4236 21.1461 15.1434C21.0731 14.9961 20.9366 14.8596 20.6636 14.5866C20.3905 14.3136 20.254 14.1771 20.1067 14.1041C19.8265 13.9653 19.4975 13.9653 19.2173 14.1041C19.0701 14.1771 18.9335 14.3136 18.6605 14.5866L18.6605 14.5866L13.8369 19.4106C13.5475 19.7 13.4027 19.8447 13.3265 20.0287C13.2502 20.2128 13.2502 20.4174 13.2502 20.8268Z" />
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
                                All Posts
                            </a>
                        </div>
                    </details>
                </li>
            </ul>
        </div>
    </div>
</div>
