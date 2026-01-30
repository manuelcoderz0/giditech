<script>
    import layout  from '@/js/pages/admin/layouts/app.svelte';
    import breadcrumb from '@/js/pages/admin/partials/breadcrumb.svelte';
    import { onMount } from 'svelte';
    import { page, inertia } from '@inertiajs/svelte';


    $: page_title  = $page.props.page_title;

    onMount(() => {


    });
</script>


<svelte:component this={ layout }>
    <svelte:component this={ breadcrumb } title={page_title}>
        <a href="" use:inertia={{ prefetch: true }} class="text-blue-700 border border-blue-700 hover:bg-blue-800 focus:outline-none  font-medium rounded px-3 py-2 text-sm text-center hover:text-white inline-flex items-center add">
            <svg class="w-4 h-4 me-2 stroke-[1.5] stroke-current fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16.3083 4.38394C15.7173 4.38394 15.4217 4.38394 15.1525 4.28405C15.1151 4.27017 15.0783 4.25491 15.042 4.23828C14.781 4.11855 14.5721 3.90959 14.1541 3.49167C13.1922 2.52977 12.7113 2.04882 12.1195 2.00447C12.04 1.99851 11.96 1.99851 11.8805 2.00447C11.2887 2.04882 10.8077 2.52977 9.84585 3.49166C9.42793 3.90959 9.21897 4.11855 8.95797 4.23828C8.92172 4.25491 8.88486 4.27017 8.84747 4.28405C8.57825 4.38394 8.28273 4.38394 7.69171 4.38394H7.58269C6.07478 4.38394 5.32083 4.38394 4.85239 4.85239C4.38394 5.32083 4.38394 6.07478 4.38394 7.58269V7.69171C4.38394 8.28273 4.38394 8.57825 4.28405 8.84747C4.27017 8.88486 4.25491 8.92172 4.23828 8.95797C4.11855 9.21897 3.90959 9.42793 3.49166 9.84585C2.52977 10.8077 2.04882 11.2887 2.00447 11.8805C1.99851 11.96 1.99851 12.04 2.00447 12.1195C2.04882 12.7113 2.52977 13.1922 3.49166 14.1541C3.90959 14.5721 4.11855 14.781 4.23828 15.042C4.25491 15.0783 4.27017 15.1151 4.28405 15.1525C4.38394 15.4217 4.38394 15.7173 4.38394 16.3083V16.4173C4.38394 17.9252 4.38394 18.6792 4.85239 19.1476C5.32083 19.6161 6.07478 19.6161 7.58269 19.6161H7.69171C8.28273 19.6161 8.57825 19.6161 8.84747 19.7159C8.88486 19.7298 8.92172 19.7451 8.95797 19.7617C9.21897 19.8815 9.42793 20.0904 9.84585 20.5083C10.8077 21.4702 11.2887 21.9512 11.8805 21.9955C11.96 22.0015 12.04 22.0015 12.1195 21.9955C12.7113 21.9512 13.1922 21.4702 14.1541 20.5083C14.5721 20.0904 14.781 19.8815 15.042 19.7617C15.0783 19.7451 15.1151 19.7298 15.1525 19.7159C15.4217 19.6161 15.7173 19.6161 16.3083 19.6161H16.4173C17.9252 19.6161 18.6792 19.6161 19.1476 19.1476C19.6161 18.6792 19.6161 17.9252 19.6161 16.4173V16.3083C19.6161 15.7173 19.6161 15.4217 19.7159 15.1525C19.7298 15.1151 19.7451 15.0783 19.7617 15.042C19.8815 14.781 20.0904 14.5721 20.5083 14.1541C21.4702 13.1922 21.9512 12.7113 21.9955 12.1195C22.0015 12.04 22.0015 11.96 21.9955 11.8805C21.9512 11.2887 21.4702 10.8077 20.5083 9.84585C20.0904 9.42793 19.8815 9.21897 19.7617 8.95797C19.7451 8.92172 19.7298 8.88486 19.7159 8.84747C19.6161 8.57825 19.6161 8.28273 19.6161 7.69171V7.58269C19.6161 6.07478 19.6161 5.32083 19.1476 4.85239C18.6792 4.38394 17.9252 4.38394 16.4173 4.38394H16.3083Z" ></path>
                <path d="M12 8V12L14.8037 13.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Cron
        </a>
    </svelte:component>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-5">

        <a href="" use:inertia={{ prefetch: true }} class="flex items-center h-20 rounded-sm bg-white border border-blue-600">
            <div class="bg-blue-400/40 mx-3 rounded h-14 w-18 flex items-center justify-center">
                <svg class="size-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15.5 11C15.5 9.067 13.933 7.5 12 7.5C10.067 7.5 8.5 9.067 8.5 11C8.5 12.933 10.067 14.5 12 14.5C13.933 14.5 15.5 12.933 15.5 11Z"  />
                    <path d="M15.4827 11.3499C15.8047 11.4475 16.1462 11.5 16.5 11.5C18.433 11.5 20 9.933 20 8C20 6.067 18.433 4.5 16.5 4.5C14.6851 4.5 13.1928 5.8814 13.0173 7.65013" />
                    <path d="M10.9827 7.65013C10.8072 5.8814 9.31492 4.5 7.5 4.5C5.567 4.5 4 6.067 4 8C4 9.933 5.567 11.5 7.5 11.5C7.85381 11.5 8.19535 11.4475 8.51727 11.3499" />
                    <path d="M22 16.5C22 13.7386 19.5376 11.5 16.5 11.5"  />
                    <path d="M17.5 19.5C17.5 16.7386 15.0376 14.5 12 14.5C8.96243 14.5 6.5 16.7386 6.5 19.5"  />
                    <path d="M7.5 11.5C4.46243 11.5 2 13.7386 2 16.5"  />
                </svg>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    <h6 class="font-medium">Total Posts</h6>
                    <h3 class="font-medium text-xl">23</h3>
                </div>
                <div class="flex items-center mr-3 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
                        <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

        <a href="" use:inertia={{ prefetch: true }} class="flex items-center h-20 rounded-sm bg-white border border-green-600">
            <div class="bg-green-400/40 mx-3 rounded h-14 w-18 flex items-center justify-center">
                <svg class="size-8 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="#ffffff" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12C13.6569 12 15 10.6569 15 9Z" />
                    <path d="M22 19C22 17.3431 20.6569 16 19 16C17.3431 16 16 17.3431 16 19C16 20.6569 17.3431 22 19 22C20.6569 22 22 20.6569 22 19Z"  />
                    <path d="M21.8526 13.7202C21.9495 13.1613 22 12.5866 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C12.5866 22 13.1613 21.9495 13.7202 21.8526" />
                    <path d="M7 17C7 14.2386 9.23858 12 12 12C13.5743 12 14.9786 12.7276 15.8951 13.8648" />
                </svg>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    <h6 class="">Active Posts</h6>
                    <h3 class="font-medium text-xl">23</h3>
                </div>
                <div class="flex items-center mr-3 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
                        <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

        <a href="" use:inertia={{ prefetch: true }} class="flex items-center h-20 rounded-sm bg-white border border-red-600">
            <div class="bg-red-400/40 mx-3 rounded h-14 w-18 flex items-center justify-center">
                <svg class="size-8 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" >
                    <path d="M7 7.5L9.94202 9.23943C11.6572 10.2535 12.3428 10.2535 14.058 9.23943L17 7.5" />
                    <path d="M21.9928 11C22.0047 10.1743 22.0019 10.3514 21.9842 9.52439C21.9189 6.45886 21.8862 4.92609 20.7551 3.79066C19.6239 2.65523 18.0497 2.61568 14.9012 2.53657C12.9607 2.48781 11.0393 2.48781 9.09882 2.53656C5.95033 2.61566 4.37608 2.65521 3.24495 3.79065C2.11382 4.92608 2.08114 6.45885 2.01576 9.52438C1.99474 10.5101 1.99475 11.4899 2.01577 12.4756C2.08114 15.5412 2.11383 17.0739 3.24496 18.2094C4.37608 19.3448 5.95033 19.3843 9.09883 19.4634C10.0691 19.4878 11.0345 19.5 12 19.5" />
                    <path d="M15 14.5L18.5 18M18.5 18L22 21.5M18.5 18L15 21.5M18.5 18L22 14.5"/>
                </svg>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    <h6 class="">Pending Posts</h6>
                    <h3 class="font-medium text-xl">23</h3>
                </div>
                <div class="flex items-center mr-3 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
                        <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

        <a href="" use:inertia={{ prefetch: true }} class="flex items-center h-20 rounded-sm bg-white border border-orange-600">
            <div class="bg-orange-400/40 mx-3 rounded h-14 w-18 flex items-center justify-center">
                <svg class="size-8 text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 7C17 4.64298 17 3.46447 16.2678 2.73223C15.5355 2 14.357 2 12 2H9C6.64298 2 5.46447 2 4.73223 2.73223C4 3.46447 4 4.64298 4 7V17C4 19.357 4 20.5355 4.73223 21.2678C5.46447 22 6.64298 22 9 22H12C14.357 22 15.5355 22 16.2678 21.2678C17 20.5355 17 19.357 17 17"  />
                    <path d="M12.5 2H8.5L9 3H12L12.5 2Z"/>
                    <path d="M14 9L20 15M20 9L14 15" />
                </svg>
            </div>
            <div class="flex justify-between w-full">
                <div>
                    <h6 class="">Rejected Posts</h6>
                    <h3 class="font-medium text-xl">23</h3>
                </div>
                <div class="flex items-center mr-3 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
                        <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </a>

    </div>





</svelte:component>
