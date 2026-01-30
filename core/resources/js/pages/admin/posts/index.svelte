<script>
    import layout  from '@/js/pages/admin/layouts/app.svelte';
    import breadcrumb from '@/js/pages/admin/partials/breadcrumb.svelte';
    import confirmation from '@/js/components/confirmation.svelte';
    import searchform from '@/js/components/search-form.svelte';
    import { useForm, page, inertia, InfiniteScroll } from '@inertiajs/svelte';
    import { onMount } from 'svelte';
    import { default as jq } from 'jquery';


    $: page_title = $page.props.page_title;
    $: posts = $page.props.posts;
    $: categories = $page.props.categories;

</script>

<svelte:head>
    <title>{ page_title }</title>
</svelte:head>


<style>
    @media (min-width: 640px) {
        .sm\:table-cell {
            display: table-cell;
        }
    }
    @media (min-width: 768px) {
        .md\:table-cell {
            display: table-cell;
        }
    }
</style>


<svelte:component this={ layout }>
    <svelte:component this={ breadcrumb } title="{ page_title }">
        <svelte:component this={ searchform }></svelte:component>

        <a href="{ route('admin.post.create') }" use:inertia={{ prefetch: true }} class="text-blue-700 border border-blue-700 hover:bg-blue-800 focus:outline-none  font-medium rounded px-3 py-2 text-sm text-center hover:text-white inline-flex items-center">
            <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 4V20M20 12H4"  />
            </svg>
            Add New
        </a>
    </svelte:component>


    <div class="grid grid-cols-1">
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-opacity-5 md:rounded-lg">
                        <svelte:component this={ InfiniteScroll } data="posts">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-700 sm:pl-6">Title</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-700 hidden md:table-cell">Status</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>

                                
                                <tbody class="divide-y divide-gray-200 bg-white">

                                    {#each posts.data as post}
                                        <tr>
                                            <td class="w-full max-w-0 truncate whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-700 sm:w-auto sm:pl-6 sm:max-w-none">
                                                { post.title }
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden md:table-cell">
                                                {@html post.status_badge}
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <div class="flex flex-wrap justify-end gap-2">
                                                    <div class="flex gap-2">
                                                        <a href="{ route('admin.post.edit', post.id) }" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                                            <svg class="w-2.5 h-2.5 text-white me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" >
                                                                <path d="M3.78181 16.3092L3 21L7.69086 20.2182C8.50544 20.0825 9.25725 19.6956 9.84119 19.1116L20.4198 8.53288C21.1934 7.75922 21.1934 6.5049 20.4197 5.73126L18.2687 3.58024C17.495 2.80658 16.2406 2.80659 15.4669 3.58027L4.88841 14.159C4.30447 14.7429 3.91757 15.4947 3.78181 16.3092Z"/>
                                                                <path d="M14 6L18 10"/>
                                                            </svg>
                                                            Edit
                                                        </a>
                                                    
                                                        {#if post.status}
                                                            <button command="show-modal" commandfor="confirm" data-question="Are you sure to disable this post? This action can be undone." data-action="{ route('admin.post.status', post.id) }" type="button" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-red-600 hover:bg-red-700 focus:ring-red-800 confirm">
                                                                <svg class="size-3 me-1 stroke-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none">
                                                                    <path d="M14.5 8C14.5 5.23858 12.2614 3 9.5 3C6.73858 3 4.5 5.23858 4.5 8C4.5 10.7614 6.73858 13 9.5 13C12.2614 13 14.5 10.7614 14.5 8Z"  stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M2.5 20C2.5 16.134 5.63401 13 9.5 13C10.5736 13 11.5907 13.2417 12.5 13.6736" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15.55 15.05L20.45 19.95M21.5 17.5C21.5 15.567 19.933 14 18 14C16.067 14 14.5 15.567 14.5 17.5C14.5 19.433 16.067 21 18 21C19.933 21 21.5 19.433 21.5 17.5Z"  stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                                Disable
                                                            </button>
                                                        {:else}
                                                            <button command="show-modal" commandfor="confirm" data-question="Are you sure to enable this post? This action can be undone." data-action="{ route('admin.post.status', post.id) }" type="button" class="px-2 py-1 text-xs font-medium text-center inline-flex items-center text-white rounded focus:outline-none bg-green-600 hover:bg-green-700 focus:ring-green-800 confirm">
                                                                <svg class="size-3 me-1 stroke-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M15 8C15 5.23858 12.7614 3 10 3C7.23858 3 5 5.23858 5 8C5 10.7614 7.23858 13 10 13C12.7614 13 15 10.7614 15 8Z" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M3 20C3 16.134 6.13401 13 10 13C11.9587 13 13.7295 13.8045 15 15.101"  stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M13 18.5C13 18.5 14.3485 19.0067 15 21C15 21 18.1765 16 21 15" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Enable
                                                            </button>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    {:else}
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-sm text-gray-500">
                                                No posts found.
                                            </td>
                                        </tr>
                                    {/each}
                                </tbody>

                            </table>
                        </svelte:component>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <svelte:component this={ confirmation }></svelte:component>
</svelte:component>

