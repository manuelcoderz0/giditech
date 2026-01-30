<script>
    import layout  from '@/js/pages/layouts/app.svelte';
    import { inertia, page, InfiniteScroll } from '@inertiajs/svelte';
    import { DateTime as dt } from 'luxon';
    import { get_image, get_file_path, get_file_size, str_limit } from '@/js/stores/helpers.js';

    $: page_title = $page.props.page_title;
    $: search_input = $page.props.search_input;
    $: search_items = $page.props.search_items;
    $: latest_posts = $page.props.latest_posts;

    //$: console.log(category);
</script>

<svelte:head>
    <title>{ page_title }</title>
</svelte:head>

<svelte:component this={layout}>
    <section class="bg-white dark:bg-[#151516]">
        <nav class="w-full mx-auto max-w-340 relative px-6 sm:px-6 md:px-8 lg:px-20">
            <ol class="flex items-center whitespace-nowrap py-5">
                <li class="inline-flex items-center">
                    <a href="{ route('home') }" use:inertia={{ prefetch: true }} class="flex items-center text-[12px] text-[#999] hover:text-[#777] focus:outline-hidden">
                        Home
                    </a>
                    <svg class="shrink-0 mx-2 size-3 text-[#999] dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center text-[12px] font-semibold text-[#777] truncate dark:text-[#777]" aria-current="page">
                    { page_title }
                </li>
            </ol>
        </nav>

        <div class="md:flex mx-auto max-w-340 px-6 sm:px-6 md:px-8 lg:px-20 gap-8 mt-2">
            


            <div class="md:flex-1">
                <h1 class="text-[19px] font-semibold uppercase pl-3.5 mb-12 text-black dark:text-white border-l-3 border-[#900068]">Search Results: <span class="font-bold">{ search_input }</span></h1>

                <svelte:component this={ InfiniteScroll } data="search_items">
                    <div class="grid sm:grid-cols-2 gap-8">
                        {#each search_items.data as post}
                            <article>
                                <div class="mb-4 relative ">
                                    <a href="{ route('post.details', post.slug) }" use:inertia={{ prefetch: true }} aria-label="" class="block overflow-hidden">
                                        <img src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" alt="{ post.title }" class="w-full h-auto transform hover:scale-105 transition-transform duration-300 ease-in-out">
                                    </a>    
                                    <span class="top-auto absolute bg-[#900068] bottom-0 z-1 max-w-[calc(100%-14px)]">
                                        <a href="{ route('post.details', post.slug) }" use:inertia={{ prefetch: true }} class="inline-flex  px-2 text-white rounded uppercase text-[11px]">{ post.category.name }</a>
                                    </span> 
                                </div>
                                <div class="relative">
                                    <div class="flex flex-col ">
                                        <h2 class="text-[20px] font-bold text-[#161616] dark:text-white hover:text-[#900068] leading-[1.36] mb-2">
                                            <a href="{ route('post.details', post.slug) }" use:inertia={{ prefetch: true }}>{ str_limit(post.title, 200) }</a>
                                        </h2>
                                        <div>
                                            <span class="text-[#8a8a8a] text-[12px] mr-1">By <a href="" class="text-[#191919] dark:text-[#ececec]">{ post.admin.name }</a></span>
                                            <span class="text-[#8a8a8a] text-[12px] mr-4.5">- { dt.fromISO(post.created_at).toFormat('dd LLL yyyy hh:mm a') } </span>
                                        </div>
                                    </div>
                                    <div class="mt-4 ">
                                        <p class="text-[#505050] dark:text-[#ccc] text-[15px]">{ str_limit(post.short_description, 500) }</p>
                                    </div>
                                </div>
                            </article>
                        {/each}
                    </div>
                </svelte:component>
            </div>






            <div class="md:block w-full md:w-85 rounded-lg sticky top-6.25 md:top-0 mt-6.25 md:mt-0 self-start h-max">
                <div>
                    <div class="bg-black py-2.25 px-3.5 mb-6.5">
                        <h5 class="text-[13px] text-white uppercase font-medium">Latest Posts</h5>
                    </div>
                    <div class="flex flex-col gap-4">

                        {#each latest_posts as post}
                            <article class="flex">
                                <div class="w-27.5 h-19 max-w-[40%] mr-4.5 shrink-0">
                                    <a href="{ route('post.details', post.slug) }" use:inertia>
                                        <img src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" alt="{ post.title }" class="w-full h-full object-cover">
                                    </a>
                                </div>
                                <div class="flex flex-col">
                                    <h4 class="text-[14px] font-semibold">
                                        <a href="{ route('post.details', post.slug) }" use:inertia class="hover:text-[#900068] dark:text-white">{ post.title }</a>
                                    </h4>
                                    <div class="flex items-center mt-2">
                                        <span class="text-[#8a8a8a] text-xs mr-3"> { dt.fromISO(post.created_at).toFormat('LLLL dd, yyyy') }</span>
                                        <span class="text-[#8a8a8a] text-xs flex items-center gap-1">
                                            <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 9V20" />
                                                <path d="M8 4V20" />
                                                <path d="M12 11V20" />
                                                <path d="M16 7V20" />
                                                <path d="M20 14V20" />
                                            </svg>
                                            { post.views } views
                                        </span>
                                    </div>
                                </div>
                            </article>
                        {/each}

                    </div>
                </div>
               
                <div class="mt-10">
                    <div class="bg-black py-2.25 px-3.5 mb-6.5">
                        <h5 class="text-[13px] text-white uppercase font-medium">Stay In Touch</h5>
                    </div>
                    <div class="flex flex-col gap-3">
                       <a href="" target="_blank" class="w-full border text-[13px] font-semibold border-gray-200 dark:border-[#FFFFFF21] text-[#333] dark:text-white min-h-12 flex items-center px-3.5 py-1.5">
                            <svg class="size-4.5 stroke-2 stroke-[#fe2c55] fill-none mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke-linejoin="round">
                                <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" />
                                <path d="M10.5359 11.0075C9.71585 10.8916 7.84666 11.0834 6.93011 12.7782C6.01355 14.4729 6.9373 16.2368 7.51374 16.9069C8.08298 17.5338 9.89226 18.721 11.8114 17.5619C12.2871 17.2746 12.8797 17.0603 13.552 14.8153L13.4738 5.98145C13.3441 6.95419 14.4186 9.23575 17.478 9.5057" />
                            </svg>
                            TikTok
                       </a>
                       <a href="" target="_blank" class="w-full border text-[13px] font-semibold border-gray-200 text-[#333] dark:border-[#FFFFFF21] dark:text-white min-h-12 flex items-center px-3.5 py-1.5">
                            <svg class="size-4.5 stroke-2 stroke-[#55acef] fill-none mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516" />
                            </svg>
                            Twitter
                       </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</svelte:component>