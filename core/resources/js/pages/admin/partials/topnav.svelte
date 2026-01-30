<script>
    import { inertia, page } from '@inertiajs/svelte';
    import { site_logo, get_image, str_limit } from '@/js/stores/helpers.js';

    import { createEventDispatcher } from 'svelte';
    const dispatch = createEventDispatcher();

    function toggle() {
        dispatch("toggle");
    }


    $: admin_notifications = $page.props.admin_notifications || [];
    $: admin_notification_count = $page.props.admin_notification_count || 0;
    
    //$: console.log('Admin Notifications: ', $page.props.admin_notifications);
</script>

<nav class="relative bg-[#071251] flex flex-col md:flex-row items-center px-[30px] py-[15px] border-b border-[#dee4ec] transition-all duration-500 ease-[cubic-bezier(0.4,-0.25,0.25,1.1)] lg:ml-[250px] max-[575px]:px-[10px] max-[575px]:py-[10px]">
    <div class="flex flex-wrap max-[767px]:w-full">
        <button type="button" class="cursor-pointer me-3 lg:hidden" aria-label="Toggle" on:click={toggle}>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 5L16 5" />
                <path d="M4 12L20 12" />
                <path d="M4 19L12 19"  />
            </svg>
        </button>
        <form action="" class="relative w-[300px] max-[767px]:flex-1">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-white/70" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="search" class="bg-white/5 text-white/70 placeholder-white/70 w-full border border-white/15 rounded-md pl-10" placeholder="Search here..." required />
            </div>
        </form>
    </div>
    <div class="ml-auto max-[767px]:mt-[8px] max-[767px]:w-full m-md-0">
        <ul class="flex flex-wrap items-center">

          
            <li class="mr-4 relative group hs-tooltip [--placement:auto]">
                <a href="{ route('home') }" use:inertia={{ prefetch: true }} class="hs-tooltip-toggle">
                    <svg class="w-5 h-5 stroke-white stroke-[1.5] fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round">
                        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 9.20746 3.14465 6.68227 4.99037 4.86802M12 22C11.037 21.2864 11.1907 20.4555 11.6738 19.6247C12.4166 18.3474 12.4166 18.3474 12.4166 16.6444C12.4166 14.9414 13.4286 14.1429 17 14.8571C18.6047 15.1781 19.7741 12.9609 21.8573 13.693M12 22C16.9458 22 21.053 18.4096 21.8573 13.693M21.8573 13.693C21.9511 13.1427 22 12.5771 22 12C22 7.11857 18.5024 3.05405 13.8766 2.17579M13.8766 2.17579C14.3872 3.11599 14.1816 4.23551 13.1027 4.66298C11.3429 5.3603 12.6029 6.64343 11.1035 7.4356C10.1038 7.96372 8.6044 7.83152 7.10496 6.24716C6.31517 5.41264 5.83966 4.95765 4.99037 4.86802M13.8766 2.17579C13.2687 2.06039 12.6414 2 12 2C9.26969 2 6.79495 3.09421 4.99037 4.86802" />
                    </svg>

                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible rounded-md z-10 py-1.5 px-2 bg-gray-900 text-xs text-white" role="tooltip">
                        Visit Site
                    </span>
                </a>
            </li>


            

            <li class="mr-4 h-5 relative">
                <el-dropdown class="inline-block">
                    <button>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="#ffffff" fill="none">
                            <path d="M15.5 18C15.5 19.933 13.933 21.5 12 21.5C10.067 21.5 8.5 19.933 8.5 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19.2311 18H4.76887C3.79195 18 3 17.208 3 16.2311C3 15.762 3.18636 15.3121 3.51809 14.9803L4.12132 14.3771C4.68393 13.8145 5 13.0514 5 12.2558V9.5C5 5.63401 8.13401 2.5 12 2.5C15.866 2.5 19 5.634 19 9.5V12.2558C19 13.0514 19.3161 13.8145 19.8787 14.3771L20.4819 14.9803C20.8136 15.3121 21 15.762 21 16.2311C21 17.208 20.208 18 19.2311 18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <!-- Dot badge -->
                        {#if admin_notification_count > 0}
                            <span class="flex absolute top-0 end-0 -mt-2 -me-2">
                                <span class="animate-ping absolute inline-flex w-3.5 h-3.5 rounded-full bg-red-400 opacity-75 dark:bg-red-600"></span>
                                <span class="relative inline-flex items-center justify-center w-3.5 h-3.5 rounded-full bg-red-500 text-white text-xxs">
                                    {admin_notification_count <= 9 ? admin_notification_count : '9+'}
                                </span>
                            </span>
                        {/if}
                    </button>


                    <el-menu anchor="bottom end" popover class="w-56 origin-top-right rounded-md outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                        <!-- Dropdown menu -->
                        <div class="z-20 w-full max-w-sm bg-white divide-y rounded-lg shadow-sm divide-gray-200">
                            <div class="block px-4 py-2 font-medium text-gray-700 rounded-t-lg bg-gray-50 dark:text-white">
                                <h4 class="text-sm text-gray-500">Notifications</h4>
                                <p class="text-xs text-gray-500">You have {admin_notification_count} notifications</p>
                            </div>
                            <div class="divide-y divide-gray-200">
                                {#each admin_notifications.slice(0, 5) as notification}
                                    <a href="{ route('admin.notification.read', notification.id) }" use:inertia  class="flex px-4 py-3 hover:bg-gray-200">
                                        <div class="w-full">
                                            <div class="text-xs mb-1.5 text-gray-400">{ str_limit(notification.title, 50) }</div>
                                            <div class="text-xs text-blue-600">{new Date(notification.created_at).toLocaleString()}</div>
                                        </div>
                                    </a>
                                {:else}
                                    <div class="empty-notification p-6 text-center">
                                        <img class="mx-auto h-40" src="{ get_image('assets/images/empty_list.png') }" alt="empty" />
                                        <p class="mt-3 text-white">No unread notification found</p>
                                    </div>
                                {/each}
                            </div>
                            <a href="{ route('admin.notifications') }" use:inertia class="block py-2 text-xs font-medium text-center text-gray-700 rounded-b-lg bg-gray-50 hover:bg-gray-200">
                                <div class="inline-flex items-center hover:text-blue-600">
                                    View All
                                </div>
                            </a>
                        </div>
                    </el-menu>
                </el-dropdown>
            </li>

            <li class="mr-4 relative group hs-tooltip [--placement:auto]">
                <a href="" use:inertia={{ prefetch: true }} class="hs-tooltip-toggle">
                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                        <path d="M15.5 12C15.5 13.933 13.933 15.5 12 15.5C10.067 15.5 8.5 13.933 8.5 12C8.5 10.067 10.067 8.5 12 8.5C13.933 8.5 15.5 10.067 15.5 12Z"  />
                        <path d="M21.011 14.0965C21.5329 13.9558 21.7939 13.8854 21.8969 13.7508C22 13.6163 22 13.3998 22 12.9669V11.0332C22 10.6003 22 10.3838 21.8969 10.2493C21.7938 10.1147 21.5329 10.0443 21.011 9.90358C19.0606 9.37759 17.8399 7.33851 18.3433 5.40087C18.4817 4.86799 18.5509 4.60156 18.4848 4.44529C18.4187 4.28902 18.2291 4.18134 17.8497 3.96596L16.125 2.98673C15.7528 2.77539 15.5667 2.66972 15.3997 2.69222C15.2326 2.71472 15.0442 2.90273 14.6672 3.27873C13.208 4.73448 10.7936 4.73442 9.33434 3.27864C8.95743 2.90263 8.76898 2.71463 8.60193 2.69212C8.43489 2.66962 8.24877 2.77529 7.87653 2.98663L6.15184 3.96587C5.77253 4.18123 5.58287 4.28891 5.51678 4.44515C5.45068 4.6014 5.51987 4.86787 5.65825 5.4008C6.16137 7.3385 4.93972 9.37763 2.98902 9.9036C2.46712 10.0443 2.20617 10.1147 2.10308 10.2492C2 10.3838 2 10.6003 2 11.0332V12.9669C2 13.3998 2 13.6163 2.10308 13.7508C2.20615 13.8854 2.46711 13.9558 2.98902 14.0965C4.9394 14.6225 6.16008 16.6616 5.65672 18.5992C5.51829 19.1321 5.44907 19.3985 5.51516 19.5548C5.58126 19.7111 5.77092 19.8188 6.15025 20.0341L7.87495 21.0134C8.24721 21.2247 8.43334 21.3304 8.6004 21.3079C8.76746 21.2854 8.95588 21.0973 9.33271 20.7213C10.7927 19.2644 13.2088 19.2643 14.6689 20.7212C15.0457 21.0973 15.2341 21.2853 15.4012 21.3078C15.5682 21.3303 15.7544 21.2246 16.1266 21.0133L17.8513 20.034C18.2307 19.8187 18.4204 19.711 18.4864 19.5547C18.5525 19.3984 18.4833 19.132 18.3448 18.5991C17.8412 16.6616 19.0609 14.6226 21.011 14.0965Z"  />
                    </svg>

                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible rounded-md z-10 py-1.5 px-2 bg-gray-900 text-xs text-white" role="tooltip">
                        Settings
                    </span>
                </a>
            </li>


            <li class="flex mr-0 max-[767px]:flex-1 justify-end">
                <el-dropdown class="inline-block">
                    <button class="inline-flex w-full justify-center items-center gap-x-1 py-2 text-sm font-semibold text-white">
                        <!-- svelte-ignore a11y_img_redundant_alt -->
                        <img class="w-8 h-8 rounded-full" src="{ get_image($page.props.auth.admin.image, 'adminProfile') }" aria-label="" alt="User Photo"/>
                        { $page.props.auth.admin.username }
                        <svg class="mr-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M18 9.00005C18 9.00005 13.5811 15 12 15C10.4188 15 6 9 6 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <el-menu anchor="bottom end" popover class="m-w-40 origin-top-right divide-y divide-[#e5e5e5] rounded-lg bg-white outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                        <a href="{ route('admin.profile') }" use:inertia class="flex items-center gap-1 px-4 py-2 text-sm text-[#071251] focus:bg-gray-100 focus:outline-hidden">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="#ffffff" fill="none">
                                <path d="M17 8.5C17 5.73858 14.7614 3.5 12 3.5C9.23858 3.5 7 5.73858 7 8.5C7 11.2614 9.23858 13.5 12 13.5C14.7614 13.5 17 11.2614 17 8.5Z" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19 20.5C19 16.634 15.866 13.5 12 13.5C8.13401 13.5 5 16.634 5 20.5" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Profile
                        </a>
                        <a href="{ route('admin.password') }" use:inertia class="flex items-center gap-1 px-4 py-2 text-sm text-[#071251] focus:bg-gray-100 focus:outline-hidden">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.491 15.5H14.5M9.5 15.5H9.50897"  />
                                <path d="M4.26781 18.8447C4.49269 20.515 5.87613 21.8235 7.55966 21.9009C8.97627 21.966 10.4153 22 12 22C13.5847 22 15.0237 21.966 16.4403 21.9009C18.1239 21.8235 19.5073 20.515 19.7322 18.8447C19.879 17.7547 20 16.6376 20 15.5C20 14.3624 19.879 13.2453 19.7322 12.1553C19.5073 10.485 18.1239 9.17649 16.4403 9.09909C15.0237 9.03397 13.5847 9 12 9C10.4153 9 8.97627 9.03397 7.55966 9.09909C5.87613 9.17649 4.49269 10.485 4.26781 12.1553C4.12105 13.2453 4 14.3624 4 15.5C4 16.6376 4.12105 17.7547 4.26781 18.8447Z"  />
                                <path d="M7.5 9V6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5V9"  />
                            </svg>
                            Password
                        </a>
                        <a href="{ route('admin.logout') }" use:inertia class="flex items-center gap-1 px-4 py-2 text-sm text-[#071251] focus:bg-gray-100 focus:outline-hidden">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" >
                                <path d="M7.00003 3C6.07006 3 5.60507 3 5.22357 3.10222C4.1883 3.37962 3.37966 4.18827 3.10225 5.22354C3.00003 5.60504 3.00003 6.07003 3.00003 7L3.00003 17C3.00003 17.93 3.00003 18.395 3.10225 18.7765C3.37965 19.8117 4.1883 20.6204 5.22357 20.8978C5.60507 21 6.07006 21 7.00003 21"  />
                                <path d="M16.5001 16.5C16.5001 16.5 21 13.1858 21 12C21 10.8141 16.5 7.5 16.5 7.5M20 12L8.00003 12" />
                            </svg>
                            Logout
                        </a>
                    </el-menu>
                </el-dropdown>
            </li>
        </ul>
    </div>
</nav>

