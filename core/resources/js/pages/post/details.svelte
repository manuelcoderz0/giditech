<script>
    import layout  from '@/js/pages/layouts/app.svelte';
    import { inertia, page } from '@inertiajs/svelte';
    import { DateTime as dt } from 'luxon';
    import { get_image, get_file_path, get_file_size, str_limit } from '@/js/stores/helpers.js';

    $: page_title = $page.props.page_title;
    $: post = $page.props.post;
    $: top_posts = $page.props.top_posts;
    $: trending_posts = $page.props.trending_posts;

    const encode = encodeURIComponent;
</script>

<style>
    :global(.prose a) {
        color: #900068;
    }
    :global(.prose blockquote) {
        border-left-color: #900068;
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
                        <a href="{ route('category.details', post.category.slug) }" use:inertia class="bg-[#900068] px-2 py-1 text-white text-[11px] uppercase font-semibold inline-flex mb-1.5">{ post.category.name }</a>
                    </span>
                </div>
                <h1 class="text-[35px] font-bold my-4 text-black dark:text-white">{ page_title }</h1>

                <div class="flex items-center gap-3">
                    <span class="flex items-center gap-2 text-xs text-[#8a8a8a] dark:text-[#FFFFFFA6]">
                        <img src="{ get_image(post.admin.image, 'admin_profile') }" class="size-8 rounded-full mr-1" alt="">
                        By <a href="" class="text-[#191919] dark:text-white font-semibold ms-2 hover:underline -ml-1">{ post.admin.name }</a>
                    </span>
                    <span class="text-xs text-[#8a8a8a] dark:text-[#FFFFFFA6]">- { dt.fromISO(post.created_at).toFormat('dd LLL yyyy hh:mm a') } </span>
                </div>

                <div class="mb-8 mt-4">
                    <img src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" alt="" class="w-full aspect-3/2 object-cover mt-6 mb-8 rounded-lg">
                </div>

                <div class="">
                    <article class="mb-12 prose dark:prose-invert max-w-none">
                        {@html post.description }
                    </article>
                </div>

                <div class="flex items-center mt-9 flex-wrap gap-2">
                    {#each post.tags || [] as tag}
                        <a href="" class="inline mb-1.5 px-2.5 bg-[#f7f7f7] dark:bg-[#111] text-[#999] dark:text-[#777] text-[13px] leading-7 rounded">{ tag }</a>
                    {/each}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 mt-8">
                    <div class="hidden md:block uppercase dark:text-white">
                        Share
                    </div>
                    <div class="flex gap-1">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={ encode(route('post.details', post.slug)) }"  target="_blank" aria-label="" class="w-17.5 h-8 rounded leading-8 bg-[#3b5998] flex items-center justify-center text-white">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.18182 10.3333C5.20406 10.3333 5 10.5252 5 11.4444V13.1111C5 14.0304 5.20406 14.2222 6.18182 14.2222H8.54545V20.8889C8.54545 21.8081 8.74951 22 9.72727 22H12.0909C13.0687 22 13.2727 21.8081 13.2727 20.8889V14.2222H15.9267C16.6683 14.2222 16.8594 14.0867 17.0631 13.4164L17.5696 11.7497C17.9185 10.6014 17.7035 10.3333 16.4332 10.3333H13.2727V7.55556C13.2727 6.94191 13.8018 6.44444 14.4545 6.44444H17.8182C18.7959 6.44444 19 6.25259 19 5.33333V3.11111C19 2.19185 18.7959 2 17.8182 2H14.4545C11.191 2 8.54545 4.48731 8.54545 7.55556V10.3333H6.18182Z" />
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={ post.title ?? '' }&amp;url={ encode(route('post.details', post.slug)) }" target="_blank" aria-label="" class="w-17.5 h-8 rounded leading-8 bg-[#55acef] flex items-center justify-center text-white">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516" />
                            </svg>
                        </a>
                        <a href="http://pinterest.com/pin/create/button/?url={ encode(route('post.details', post.slug)) }&description={ post.title ?? '' }" target="_blank" aria-label="" class="w-17.5 h-8 rounded leading-8 bg-[#e4223e] flex items-center justify-center text-white">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 11L8 21" />
                                <path d="M9.97368 16.5724C10.5931 16.8473 11.2787 17 12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 12.9108 7.24367 13.7646 7.66921 14.5" />
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                        </a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={ encode(route('post.details', post.slug)) }&amp;title={ post.title ?? '' }&amp;summary={ post.short_description ?? '' }" target="_blank" aria-label="" class="w-17.5 h-8 rounded leading-8 bg-[#02669a] flex items-center justify-center text-white">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M4.5 9.5H4C3.05719 9.5 2.58579 9.5 2.29289 9.79289C2 10.0858 2 10.5572 2 11.5V20C2 20.9428 2 21.4142 2.29289 21.7071C2.58579 22 3.05719 22 4 22H4.5C5.44281 22 5.91421 22 6.20711 21.7071C6.5 21.4142 6.5 20.9428 6.5 20V11.5C6.5 10.5572 6.5 10.0858 6.20711 9.79289C5.91421 9.5 5.44281 9.5 4.5 9.5Z" />
                                <path d="M6.5 4.25C6.5 5.49264 5.49264 6.5 4.25 6.5C3.00736 6.5 2 5.49264 2 4.25C2 3.00736 3.00736 2 4.25 2C5.49264 2 6.5 3.00736 6.5 4.25Z" />
                                <path d="M12.326 9.5H11.5C10.5572 9.5 10.0858 9.5 9.79289 9.79289C9.5 10.0858 9.5 10.5572 9.5 11.5V20C9.5 20.9428 9.5 21.4142 9.79289 21.7071C10.0858 22 10.5572 22 11.5 22H12C12.9428 22 13.4142 22 13.7071 21.7071C14 21.4142 14 20.9428 14 20L14.0001 16.5001C14.0001 14.8433 14.5281 13.5001 16.0879 13.5001C16.8677 13.5001 17.5 14.1717 17.5 15.0001V19.5001C17.5 20.4429 17.5 20.9143 17.7929 21.2072C18.0857 21.5001 18.5572 21.5001 19.5 21.5001H19.9987C20.9413 21.5001 21.4126 21.5001 21.7055 21.2073C21.9984 20.9145 21.9985 20.4432 21.9987 19.5006L22.0001 14.0002C22.0001 11.515 19.6364 9.50024 17.2968 9.50024C15.9649 9.50024 14.7767 10.1531 14.0001 11.174C14 10.5439 14 10.2289 13.8632 9.995C13.7765 9.84686 13.6531 9.72353 13.505 9.63687C13.2711 9.5 12.9561 9.5 12.326 9.5Z" />
                            </svg>
                        </a>
                        <a href="https://wa.me/?text={ encode((post.title ?? '') + '\n' + route('post.details', post.slug)) }" target="_blank" aria-label="" class="w-17.5 h-8 rounded leading-8 bg-[#25D366] flex items-center justify-center text-white">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.3789 2.27907 14.6926 2.78382 15.8877C3.06278 16.5481 3.20226 16.8784 3.21953 17.128C3.2368 17.3776 3.16334 17.6521 3.01642 18.2012L2 22L5.79877 20.9836C6.34788 20.8367 6.62244 20.7632 6.87202 20.7805C7.12161 20.7977 7.45185 20.9372 8.11235 21.2162C9.30745 21.7209 10.6211 22 12 22Z" />
                                <path d="M8.58815 12.3773L9.45909 11.2956C9.82616 10.8397 10.2799 10.4153 10.3155 9.80826C10.3244 9.65494 10.2166 8.96657 10.0008 7.58986C9.91601 7.04881 9.41086 7 8.97332 7C8.40314 7 8.11805 7 7.83495 7.12931C7.47714 7.29275 7.10979 7.75231 7.02917 8.13733C6.96539 8.44196 7.01279 8.65187 7.10759 9.07169C7.51023 10.8548 8.45481 12.6158 9.91948 14.0805C11.3842 15.5452 13.1452 16.4898 14.9283 16.8924C15.3481 16.9872 15.558 17.0346 15.8627 16.9708C16.2477 16.8902 16.7072 16.5229 16.8707 16.165C17 15.8819 17 15.5969 17 15.0267C17 14.5891 16.9512 14.084 16.4101 13.9992C15.0334 13.7834 14.3451 13.6756 14.1917 13.6845C13.5847 13.7201 13.1603 14.1738 12.7044 14.5409L11.6227 15.4118" />
                            </svg>
                        </a>
                        <a href="mailto:?subject={ encode(post.title ?? '') }&body={ encode((post.title ?? '') + '\n' + route('post.details', post.slug)) }" aria-label="" class="w-17.5 h-8 rounded leading-8 bg-[#000000] flex items-center justify-center text-white">
                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                <path d="M2 6L8.91302 9.91697C11.4616 11.361 12.5384 11.361 15.087 9.91697L22 6" />
                                <path d="M2.01577 13.4756C2.08114 16.5412 2.11383 18.0739 3.24496 19.2094C4.37608 20.3448 5.95033 20.3843 9.09883 20.4634C11.0393 20.5122 12.9607 20.5122 14.9012 20.4634C18.0497 20.3843 19.6239 20.3448 20.7551 19.2094C21.8862 18.0739 21.9189 16.5412 21.9842 13.4756C22.0053 12.4899 22.0053 11.5101 21.9842 10.5244C21.9189 7.45886 21.8862 5.92609 20.7551 4.79066C19.6239 3.65523 18.0497 3.61568 14.9012 3.53657C12.9607 3.48781 11.0393 3.48781 9.09882 3.53656C5.95033 3.61566 4.37608 3.65521 3.24495 4.79065C2.11382 5.92608 2.08114 7.45885 2.01576 10.5244C1.99474 11.5101 1.99475 12.4899 2.01577 13.4756Z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="my-10 border-y border-[#e8e8e8] dark:border-[#FFFFFF21] bg-[#fbfbfb] dark:bg-[#070707] px-3.5 py-2.5">
                        <h4 class="text-[#161616] dark:text-white text-[14px] font-bold uppercase">Related <span class="text-[#900068]">Posts</span></h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {#each trending_posts as post}
                            <article class="w-full">
                                <div class="mb-4">
                                    <a href="{ route('post.details', post.slug) }" use:inertia class="w-full aspect-video block">
                                        <img src="{ get_image(get_file_path('post') + '/' + post.image, get_file_size('post')) }" class="w-full h-full object-cover" alt="">
                                    </a>
                                </div>
                                <div>
                                    <h4 class="text-[16px] font-bold my-2"><a href="{ route('post.details', post.slug) }" use:inertia class="text-[#161616] hover:text-[#900068] dark:text-white">{ post.title }</a></h4>
                                    <span class="text-[#8a8a8a] text-xs">{ dt.fromISO(post.created_at).toFormat('LLLL dd, yyyy') }</span>
                                </div>
                            </article>
                        {/each}
                    </div>
                </div>

                <div>
                    <div class="my-10 border-y border-[#e8e8e8] dark:border-[#FFFFFF21] bg-[#fbfbfb] dark:bg-[#070707] px-3.5 py-2.5">
                        <h4 class="text-[#161616] dark:text-white text-[14px] font-bold uppercase">Comments <span class="text-[#900068]"></span></h4>
                    </div>
                </div>
            </div> 




            <div class="md:block w-full md:w-85 rounded-lg sticky top-6.25 md:top-5 mt-6.25 md:mt-0 self-start h-max">
                <div>
                    <div class="bg-black py-2.25 px-3.5 mb-6.5">
                        <h5 class="text-[13px] text-white uppercase font-medium">Top Posts</h5>
                    </div>
                    <div class="flex flex-col gap-4">
                        {#each top_posts as post}
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