<script>
    import layout  from '@/js/pages/layouts/app.svelte';
    import { inertia, page } from '@inertiajs/svelte';

    $: page_title = $page.props.page_title;
    $: post = $page.props.post;
</script>

<style>
    :global(.post-content a) {
        color: #900068;
        text-decoration: underline;
    }
    :global(.post-content a:hover) {
        opacity: 0.8;
    }
    :global(.post-content blockquote) {
        border-left: 4px solid #900068;
        padding-left: 16px;
        margin-left: 0;
        font-style: italic;
        color: #FFFFFFA6;
    }
</style>

<svelte:head>
    <title>{ page_title }</title>
</svelte:head>

<svelte:component this={layout}>
    <section class="bg-white dark:bg-[#151516]">
        <nav class="w-full mx-auto max-w-340 relative px-6 sm:px-6 md:px-8 lg:px-20">
            <ol class="flex items-center whitespace-nowrap py-5">
                <li class="inline-flex items-center">
                    <a href="{ route('home') }" use:inertia={{ prefetch: true }} class="flex items-center text-[12px] text-[#777] hover:text-[#777] focus:outline-hidden">
                        Home
                    </a>
                    <svg class="shrink-0 mx-1 size-3 text-[#999] dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center text-[12px] font-semibold text-[#999] truncate dark:text-[#777]" aria-current="page">
                    { page_title }
                </li>
            </ol>
        </nav>

        <div class="md:flex mx-auto max-w-340 px-6 sm:px-6 md:px-8 lg:px-20 gap-8 mt-2">
            
            <div class="md:flex-1">
                <div>
                    <span class="-mb-5">
                        <a href="" class="bg-[#900068] px-2 py-1 text-white text-[11px] uppercase font-semibold inline-flex mb-1.5">Cybersecurity</a>
                    </span>
                </div>
                <h1 class="text-[35px] font-bold my-4 text-black dark:text-white">{ page_title }</h1>

                <div class="flex items-center gap-3">
                    <span class="flex items-center gap-2 text-xs text-[#8a8a8a] dark:text-[#FFFFFFA6]">
                        <img src="https://giditech.net/wp-content/uploads/2024/08/IMG_0623-48x48.jpg" class="size-8 rounded-full mr-1" alt="">
                        By <a href="" class="text-[#191919] dark:text-white font-semibold ms-2 hover:underline -ml-1">Freda Amodun</a>
                    </span>
                    <span class="text-xs text-[#8a8a8a] dark:text-[#FFFFFFA6]">-  October 10, 2022</span>
                </div>

                <div class="mb-8 mt-4">
                    <img src="https://giditech.net/wp-content/uploads/2025/10/Image_fx-41-1024x559.png" alt="Article Image" class="w-full h-auto mt-6 mb-8 rounded-lg">
                </div>

                <div class="">
                    <article class="mb-12 text-[#161616] dark:text-[#ececec] post-content text-">
                        {@html post.description }
                    </article>
                </div>

                <div class="flex items-center mt-9">
                    <a href="" class="inline mr-2.5 mb-1.5 px-2.5 bg-[#f7f7f7] text-[#999] text-[13px] leading-7 rounded">cybersecurity</a>
                    <a href="" class="inline mr-2.5 mb-1.5 px-2.5 bg-[#f7f7f7] text-[#999] text-[13px] leading-7 rounded">cybersecurity</a>
                </div>
            </div>

            <div class="md:block w-full md:w-75 rounded-lg sticky top-6.25 md:top-0 mt-6.25 md:mt-0 self-start h-max">
                <div>
                    <div class="bg-black py-2.25 px-3.5 mb-6.5">
                        <h5 class="text-[13px] text-white uppercase font-medium">Top Posts</h5>
                    </div>
                    <div class="flex flex-col gap-4">
                        <article class="flex">
                            <div class="w-27.5 h-19 max-w-[40%] mr-4.5 shrink-0">
                                <a href="">
                                    <img src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="Thumbnail" class="w-full h-full object-cover">
                                </a>
                            </div>
                            <div class="flex flex-col">
                                <h4 class="text-[14px] font-semibold"><a href="" class="hover:text-[#900068] dark:text-white">Beyond Connecting Wallets: What Web3 Was Meant to Be</a></h4>
                                <div class="flex items-center mt-2">
                                    <span class="text-[#8a8a8a] text-xs mr-3">July 2, 2025</span>
                                    <span class="text-[#8a8a8a] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </article>

                        <article class="flex">
                            <div class="w-27.5 h-19 max-w-[40%] mr-4.5 shrink-0">
                                <a href="">
                                    <img src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="Thumbnail" class="w-full h-full object-cover">
                                </a>
                            </div>
                            <div class="flex flex-col">
                                <h4 class="text-[14px] font-semibold"><a href="" class="hover:text-[#900068] dark:text-white">Beyond Connecting Wallets: What Web3 Was</a></h4>
                                <div class="flex items-center mt-2">
                                    <span class="text-[#8a8a8a] text-xs mr-3">July 2, 2025</span>
                                    <span class="text-[#8a8a8a] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </article>

                        <article class="flex">
                            <div class="w-27.5 h-19 max-w-[40%] mr-4.5 shrink-0">
                                <a href="">
                                    <img src="https://giditech.net/wp-content/uploads/2025/07/Whisk_1735ead336-1024x559.jpg" alt="Thumbnail" class="w-full h-full object-cover">
                                </a>
                            </div>
                            <div class="flex flex-col">
                                <h4 class="text-[14px] font-semibold"><a href="" class="hover:text-[#900068] dark:text-white">Beyond Connecting Wallets: What Web3 Was</a></h4>
                                <div class="flex items-center mt-2">
                                    <span class="text-[#8a8a8a] text-xs mr-3">July 2, 2025</span>
                                    <span class="text-[#8a8a8a] text-xs flex items-center gap-1">
                                        <svg class="stroke-current size-4 stroke-1 fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 9V20" />
                                            <path d="M8 4V20" />
                                            <path d="M12 11V20" />
                                            <path d="M16 7V20" />
                                            <path d="M20 14V20" />
                                        </svg>
                                        344 views
                                    </span>
                                </div>
                            </div>
                        </article>
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