<script>
    import { site_logo, site_favicon, menu_active } from '@/js/stores/helpers.js';
    import { inertia, page, useForm } from '@inertiajs/svelte';
    import { DateTime as dt } from 'luxon';

    $: categories = $page.props.categories;
      
    $: form = useForm({
        search: '',
    })

    function submit(e) {
        e.preventDefault()
        $form.get( route('search'), {
            preserveScroll: false,
            preserveState: false,
        })
    }

</script>

<style>
    .topb {
        border-image: linear-gradient(90deg, #e40666 0%, #3c3fde 100%);
        border-image-slice: 1;
        border-image-width: 0 0 3px 0;
        border-width: 0 0 3px 0;
        border-bottom: 3px solid;
    }
    .butb {
        border-image: linear-gradient(90deg, #e40666 0%, #3c3fde 100%); 
        border-image-slice: 1; 
        border-image-width: 3px 0 0 0; 
        border-width: 3px 0;
    }
    @media (min-width: 768px) {
        .butb {
            border-image: none;
            border-width: 0;
        }
    }
</style>




<!-- ========== HEADER ========== -->
<header class="z-999 relative border-b border-[#efefef] dark:border-black">
    <div class="h-10.5 bg-black items-center topb hidden md:flex">
        <div class="w-full mx-auto max-w-340 relative px-6 sm:px-6 md:px-8 lg:px-20">
            <div class="flex items-center justify-between h-full relative">
                <div class="mr-3.75 flex items-center">
                    <span class="text-white text-[13px]">{ dt.now().toFormat('cccc, LLL yyyy') }</span>
                </div>

                <div class="ml-3.75 flex items-center">
                    <div class="flex items-center gap-1">
                        <a href="#" aria-label="X" class="flex items-center justify-center size-6.5 p-1 rounded-full bg-[#ffffff1f] border">
                            <svg class="size-3.5 text-white stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516" />
                            </svg>
                        </a>
                        <a href="#" aria-label="LinkedIn" class="flex items-center justify-center size-6.5 p-1 rounded-full bg-[#ffffff1f] border">
                            <svg class="size-3.5 text-white stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M4.5 9.5H4C3.05719 9.5 2.58579 9.5 2.29289 9.79289C2 10.0858 2 10.5572 2 11.5V20C2 20.9428 2 21.4142 2.29289 21.7071C2.58579 22 3.05719 22 4 22H4.5C5.44281 22 5.91421 22 6.20711 21.7071C6.5 21.4142 6.5 20.9428 6.5 20V11.5C6.5 10.5572 6.5 10.0858 6.20711 9.79289C5.91421 9.5 5.44281 9.5 4.5 9.5Z" />
                                <path d="M6.5 4.25C6.5 5.49264 5.49264 6.5 4.25 6.5C3.00736 6.5 2 5.49264 2 4.25C2 3.00736 3.00736 2 4.25 2C5.49264 2 6.5 3.00736 6.5 4.25Z" />
                                <path d="M12.326 9.5H11.5C10.5572 9.5 10.0858 9.5 9.79289 9.79289C9.5 10.0858 9.5 10.5572 9.5 11.5V20C9.5 20.9428 9.5 21.4142 9.79289 21.7071C10.0858 22 10.5572 22 11.5 22H12C12.9428 22 13.4142 22 13.7071 21.7071C14 21.4142 14 20.9428 14 20L14.0001 16.5001C14.0001 14.8433 14.5281 13.5001 16.0879 13.5001C16.8677 13.5001 17.5 14.1717 17.5 15.0001V19.5001C17.5 20.4429 17.5 20.9143 17.7929 21.2072C18.0857 21.5001 18.5572 21.5001 19.5 21.5001H19.9987C20.9413 21.5001 21.4126 21.5001 21.7055 21.2073C21.9984 20.9145 21.9985 20.4432 21.9987 19.5006L22.0001 14.0002C22.0001 11.515 19.6364 9.50024 17.2968 9.50024C15.9649 9.50024 14.7767 10.1531 14.0001 11.174C14 10.5439 14 10.2289 13.8632 9.995C13.7765 9.84686 13.6531 9.72353 13.505 9.63687C13.2711 9.5 12.9561 9.5 12.326 9.5Z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="Tiktok" class="flex items-center justify-center size-6.5 p-1 rounded-full bg-[#ffffff1f] border">
                            <svg class="size-3.5 text-white stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" />
                                <path d="M10.5359 11.0075C9.71585 10.8916 7.84666 11.0834 6.93011 12.7782C6.01355 14.4729 6.9373 16.2368 7.51374 16.9069C8.08298 17.5338 9.89226 18.721 11.8114 17.5619C12.2871 17.2746 12.8797 17.0603 13.552 14.8153L13.4738 5.98145C13.3441 6.95419 14.4186 9.23575 17.478 9.5057" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-17.5 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-[#efefef] dark:bg-black butb [&.butb]:md:border-b">
        <nav class="relative md:flex md:items-center md:justify-between md:gap-3 w-full mx-auto max-w-340 px-6 sm:px-6 md:px-8 lg:px-20 bg-white dark:bg-black">
            <!-- Logo w/ Collapse Button -->
            <div class="flex items-center justify-between py-3 md:py-0 w-full">
                <a href="{ route('home') }" use:inertia class="flex-none font-semibold text-xl text-black focus:outline-hidden focus:opacity-80 dark:text-white">
                    <img src="{ site_logo() }" alt="Logo" class="h-10 block dark:hidden -ml-7">
                    <img src="{ site_logo('dark') }" alt="Logo" class="h-10 hidden dark:block -ml-7">
                </a>

                <!-- Collapse Button -->
                <div class="md:hidden">
                    <div class="flex items-center gap-3.5">
                        <button command="show-modal" commandfor="dialog" type="button" aria-label="">
                            <svg class="size-4.5 text-black dark:text-white fill-none stroke-current stroke-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 17L21 21" />
                                <path d="M19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19C15.4183 19 19 15.4183 19 11Z" />
                            </svg>
                        </button>
                        <button type="button" class="hs-dark-mode hs-dark-mode-active:hidden relative flex justify-center items-center size-7 text-black rounded-full hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="dark">
                            <span class="sr-only">Dark</span>
                            <svg class="shrink-0 size-4.5 fill-none stroke-current stroke-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path></svg>
                        </button>
                        <button type="button" class="hs-dark-mode hs-dark-mode-active:flex hidden relative flex justify-center items-center size-7 text-black rounded-full hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="light">
                            <span class="sr-only">Light</span>
                            <svg class="shrink-0 size-4.5 fill-none stroke-current stroke-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>
                        </button>
                        <button type="button" class="hs-collapse-toggle relative size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-header-classic-collapse" aria-expanded="false" aria-controls="hs-header-classic" aria-label="Toggle navigation" data-hs-collapse="#hs-header-classic">
                            <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                            <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                    </div>

                </div>
                <!-- End Collapse Button -->
            </div>
            <!-- End Logo w/ Collapse Button -->

            <!-- Collapse -->
            <div id="hs-header-classic" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-header-classic-collapse">
                <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">

                        <a href="{ route('home') }" use:inertia={{ prefetch: true }} use:menu_active={'home'} class="p-2 flex items-center text-sm font-semibold  text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"  aria-current="page">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                            Home
                        </a>

                        <!-- Dropdown -->
                        <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--adaptive:adaptive] [--is-collapse:true] md:[--is-collapse:false] ">
                            <button id="hs-header-classic-dropdown" type="button"  use:menu_active={['category.details']} class="hs-dropdown-toggle w-full p-2 flex items-center text-sm font-semibold text-gray-800 hover:text-gray-500 rounded-lg focus:outline-hidden focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 10 2.5-2.5L3 5"/><path d="m3 19 2.5-2.5L3 14"/><path d="M10 6h11"/><path d="M10 12h11"/><path d="M10 18h11"/></svg>
                                Blog
                                <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-150 hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-4.5 after:w-0.5 after:h-[calc(100%-4px)] after:bg-gray-100 dark:bg-transparent dark:md:bg-black dark:after:bg-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-header-classic-dropdown">
                                <div class="py-1 md:px-1 space-y-0.5">
                                    {#each categories as category}
                                        <a href="{ route('category.details', category.slug) }" use:inertia={{ prefetch: true }} class="py-1.5 px-2 flex items-center text-sm font-semibold text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500">
                                            { category.name }
                                        </a>
                                    {/each}
                                
                                </div>
                            </div>
                        </div>
                        <!-- End Dropdown -->


                        <a class="p-2 flex items-center text-sm font-semibold text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            About
                        </a>

                        <a class="p-2 flex items-center text-sm font-semibold hidden text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            Get In Touch
                        </a>

                    
                        <!-- Button Group -->
                        <div class="relative flex-wrap items-center gap-x-3.5 md:ps-2.5 mt-1 md:mt-0 md:ms-1.5 before:block before:absolute before:top-1/2 before:-start-px before:w-px before:h-4 before:bg-gray-300 before:-translate-y-1/2 dark:before:bg-neutral-700 hidden md:flex">
                            
                                <button command="show-modal" commandfor="dialog" type="button" aria-label="">
                                    <svg class="size-4.5 text-black dark:text-white fill-none stroke-current stroke-3 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 17L21 21" />
                                        <path d="M19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19C15.4183 19 19 15.4183 19 11Z" />
                                    </svg>
                                </button>
                                <button type="button" class="hs-dark-mode hs-dark-mode-active:hidden cursor-pointer relative flex justify-center items-center size-7 text-black rounded-full hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="dark">
                                    <span class="sr-only">Dark</span>
                                    <svg class="shrink-0 size-4.5 fill-none stroke-current stroke-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path></svg>
                                </button>
                                <button type="button" class="hs-dark-mode hs-dark-mode-active:flex hidden cursor-pointer relative flex justify-center items-center size-7 text-black rounded-full hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="light">
                                    <span class="sr-only">Light</span>
                                    <svg class="shrink-0 size-4.5 fill-none stroke-current stroke-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>
                                </button>
                    
                        </div>
                        <!-- End Button Group -->
                    </div>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->











<el-dialog>
    <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-black/90 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <!-- svelte-ignore a11y_no_noninteractive_tabindex -->
        <div tabindex="0" class="flex min-h-full items-center justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel class="relative transform overflow-hidden text-left shadow-xl outline -outline-offset-1 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="items-start">
                        <div class="mt-3 sm:mt-0 sm:text-left">
                            <div class="mt-2">
                                <form onsubmit={submit}>
                                    <!-- svelte-ignore a11y_autofocus -->
                                    <input type="search" bind:value="{ $form.search }" autofocus class="peer ps-0 py-2.5 sm:py-3 block w-full bg-transparent border-t-transparent border-b-2 border-white/10 border-x-transparent border-b-line-2 text-white font-bold placeholder:font-bold placeholder:text-white text-4xl sm:text-6xl text-foreground placeholder:text-muted-foreground-1 focus:border-t-transparent focus:border-x-transparent focus:border-b-primary-focus focus:ring-0" placeholder="Search...">
                                </form>
                                <p class="text-sm text-[#777] mt-6">Type above and press Enter to search. Press Esc to cancel.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>