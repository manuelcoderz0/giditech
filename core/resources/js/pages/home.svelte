<script>
    import layout  from '@/js/pages/layouts/app.svelte';
    import { inertia, page } from '@inertiajs/svelte';
    import { DateTime as dt } from 'luxon';
    import { get_image, get_file_path, get_file_size, str_limit } from '@/js/stores/helpers.js';

    $: page_title = $page.props.page_title;
    $: last_must_read = $page.props.last_must_read;
    $: must_read = $page.props.must_read;
    $: trending = $page.props.trending;
    $: most_popular = $page.props.most_popular;
</script>

<svelte:head>
    <title>{ page_title }</title>
</svelte:head>

<svelte:component this={layout}>
    <section>
        <div class="md:flex mx-auto max-w-340 px-6 sm:px-6 md:px-8 lg:px-20 gap-8 mt-2 pt-10">
            
            <div class="md:flex-1">
            
                <div class="mb-8 relative">
                    <img src="{ get_image(get_file_path('post') + '/' + last_must_read.image, get_file_size('post')) }" alt="" class="w-full h-auto hover:scale-105 transition-transform duration-500 ease-in-out rounded-lg">
                    <div class="absolute bottom-4 left-4">
                        <span class=" bg-[#900068]">
                            <a href="{ route('category.details', last_must_read.category.slug) }" use:inertia class="text-white text-sm px-3 py-1">{ last_must_read.category.name }</a>
                        </span>
                        <h2 class="text-[20px] md:text-[24px] lg:text-[28px] md:max-w-[80%] font-bold text-white bg-black py-1 px-1.5 my-2">
                            <a href="{ route('post.details', last_must_read.slug) }" use:inertia>{ last_must_read.title }</a>
                        </h2>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    {#each must_read as post}
                        <!-- Card -->
                        <a class="group flex flex-col focus:outline-hidden" href="{ route('post.details', post.slug) }" use:inertia>
                            <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                                <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" alt="">
                                <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-[#900068] text-white py-1.5 px-3 ">
                                    { post.category.name }
                                </span>
                            </div>

                            <div class="mt-7">
                                <h3 class="text-xl font-semibold text-gray-800 group-hover:text-[#900068] dark:text-neutral-300">
                                    { post.title }
                                </h3>
                            </div>
                        </a>
                        <!-- End Card -->
                    {/each}

                
                </div>
                <!-- End Grid -->

               

               
                <div>
                    <div class="my-10 border-y border-[#e8e8e8] dark:border-[#FFFFFF21] bg-[#fbfbfb] dark:bg-[#070707] px-3.5 py-2.5">
                        <h4 class="text-[#161616] dark:text-white text-[14px] font-bold uppercase">Trending <span class="text-[#900068]">Posts</span></h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {#each trending as post} 
                            <article class="w-full">
                                <div class="mb-4">
                                    <a href="{ route('post.details', post.slug) }" use:inertia class="w-full aspect-video block">
                                        <img src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" class="w-full h-full object-cover" alt="">
                                    </a>
                                </div>
                                <div>
                                    <h4 class="text-[16px] font-bold my-2">
                                        <a href="{ route('post.details', post.slug) }" use:inertia class="text-[#161616] hover:text-[#900068] dark:text-white">{ post.title }</a>
                                    </h4>
                                    <span class="text-[#8a8a8a] text-xs">{ dt.fromISO(post.created_at).toLocaleString(dt.DATE_MED) }</span>
                                </div>
                            </article>
                        {/each}
                    </div>
                </div>

               
            </div> 

            <div class="md:block w-full md:w-75 rounded-lg sticky top-6.25 md:top-5 mt-6.25 md:mt-0 self-start h-max">
                <div>
                    <div class="bg-black py-2.25 px-3.5 mb-6.5">
                        <h5 class="text-[13px] text-white uppercase font-medium">Popular Posts</h5>
                    </div>
                    <div class="flex flex-col gap-4">
                        {#each most_popular as post}
                            <article class="flex">
                                <div class="w-27.5 h-19 max-w-[40%] mr-4.5 shrink-0">
                                    <a href="{ route('post.details', post.slug) }" use:inertia>
                                        <img src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" alt="Thumbnail" class="w-full h-full object-cover">
                                    </a>
                                </div>
                                <div class="flex flex-col">
                                    <h4 class="text-[14px] font-semibold"><a href="{ route('post.details', post.slug) }" use:inertia class="hover:text-[#900068] dark:text-white">{ post.title }</a></h4>
                                    <div class="flex items-center mt-2">
                                        <span class="text-[#8a8a8a] text-xs mr-3">{ dt.fromISO(post.created_at).toLocaleString(dt.DATE_MED) }</span>
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

        <!-- Card Blog -->
        <div class="max-w-340 px-6 sm:px-6 md:px-8 lg:px-20 pt-10 mx-auto hidden">


            <div class="my-10 border-y border-[#e8e8e8] dark:border-[#FFFFFF21] bg-[#fbfbfb] dark:bg-[#070707] px-3.5 py-2.5">
                <h4 class="text-[#161616] dark:text-white text-[14px] font-bold uppercase">Related <span class="text-[#900068]">Posts</span></h4>
            </div>

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card -->
                <a class="group flex flex-col focus:outline-hidden" href="#">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="https://images.unsplash.com/photo-1586232702178-f044c5f4d4b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                    <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                    Sponsored
                    </span>
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                    Studio by Preline
                    </h3>
                    <p class="mt-3 text-gray-800 dark:text-neutral-200">
                    Produce professional, reliable streams easily leveraging Preline's innovative broadcast studio
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                    Read more
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </p>
                </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group flex flex-col focus:outline-hidden" href="#">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="https://images.unsplash.com/photo-1542125387-c71274d94f0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                    Onsite
                    </h3>
                    <p class="mt-3 text-gray-800 dark:text-neutral-200">
                    Optimize your in-person experience with best-in-class capabilities like badge printing and lead retrieval
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                    Read more
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </p>
                </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group relative flex flex-col w-full min-h-60 bg-[url('https://images.unsplash.com/photo-1634017839464-5c339ebe3cb4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80')] bg-center bg-cover rounded-xl hover:shadow-lg focus:outline-hidden focus:shadow-lg transition" href="#">
                <div class="flex-auto p-4 md:p-6">
                    <h3 class="text-xl text-white/90 group-hover:text-white"><span class="font-bold">Preline</span> Press publishes books about economic and technological advancement.</h3>
                </div>
                <div class="pt-0 p-4 md:p-6">
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-white group-hover:text-white/70 group-focus:text-white/70">
                    Visit the site
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </div>
                </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
    </section>
</svelte:component>